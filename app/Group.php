<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Project;
use App\Task;

class Group extends Model
{
    protected $guarded = ['id'];

    /**
     * Return group's projects.
     *
     * @return Relationship
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /**
     * Return group's users.
     *
     * @return Query
     */
    public function users()
    {
        $userIds = DB::table('project_role_user')
            ->whereIn('project_id', $this->projects()->pluck('id'))
            ->pluck('user_id');

        return User::whereIn('id', $userIds)->orWhere('id', $this->user_id);
    }

    /**
     * Return group's tasks.
     *
     * @return Relationship
     */
    public function tasks()
    {
        return $this->hasManyThrough(Task::class, Project::class);
    }
}
