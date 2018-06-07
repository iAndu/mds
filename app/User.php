<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Group;
use App\Project;
use App\Message;

class User extends Authenticatable
{
    use EntrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Return tasks assigned to user
     *
     * @return Relationship
     */
    public function tasks()
    {
        return $this->belongsToMany(\App\Task::class);
    }

    /**
     * Return user's task comments.
     *
     * @return Relationship
     */
    public function comments()
    {
        return $this->hasMany(\App\Comment::class);
    }

    /**
     * Return user's projects.
     *
     * @return Relationship
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_role_user')->withPivot('role_id');
    }

    /**
     * Return user's groups.
     *
     * @return Query
     */
    public function groups()
    {
        $groupIds = Project::whereIn('id', $this->projects()->pluck('id'))->pluck('group_id');
        $userGroups = Group::where('user_id', $this->id);

        return Group::whereIn('id', $groupIds)->union($userGroups);
    }

    public function sentMessages()
    {
	return $this->hasMany(Message::class, 'from');
    }

    public function receivedMessages()
    {
	return $this->hasMany(Message::class, 'to');
    }

    public function messages()
    {
	return Message::where('from', $this->id)->orWhere('to', $this->id);
    }

    public function messagesWith(User $user)
    {
	$sentMessages = $this->sentMessages()->where('to', $user->id)->get();
        $receivedMessages = $this->receivedMessages()->where('from', $user->id)->get();
	
	return $sentMessages->merge($receivedMessages);
    }
}
