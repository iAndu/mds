<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Group;
use App\Project;

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
        return $this->belongsToMany(\App\Task::class)->withPivot('role_id');
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
}
