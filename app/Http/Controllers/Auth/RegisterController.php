<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationComplete;
use Request;
use App\Group;
use App\Project;
use App\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $request = request();
        
        if ($request->avatar) {
            $path = $request->file('avatar')->store('public/user_avatars');
        } else {
            $path = 'public/user_avatars/default.jpg';
        }

        $path = 'storage/' . substr($path, strpos($path, '/') + 1);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'avatar' => $path,
        ]);

        //Create group

        $photo_path = 'public/group_avatars/default.jpg';

        $photo_path = 'storage/' . substr($photo_path, strpos($photo_path, '/') + 1);

        $group = Group::create([
            'name' => $data['name'],
            'user_id' => $user->id,
            'group_avatar' => $photo_path
        ]);

        //Create project

        $pm = Role::where('name', 'project-manager')->first();

        if (!$pm) {
            abort(500);
        }

        $path = 'public/project_avatars/default.jpg';

        $path = 'storage/' . substr($path, strpos($path, '/') + 1);

        $project = Project::create([
            'name' => $data['name'],
            'group_id' => $group->id,
            'avatar' => $path
        ]);

        $user->projects()->attach([$project->id => ['role_id' => $pm->id]]);

	Mail::to($user->email)->send(new RegistrationComplete($user));

	return $user;
    }
}
