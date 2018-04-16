<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        return $this->hasMany(\App\Project::class);
    }

    /**
     * Return group's users.
     *
     * @return Relationship
     */
    public function users()
    {
        return $this->hasManyThrough(\App\User::class, \App\Project::class);
    }

    /**
     * Return group's tasks.
     *
     * @return Relationship
     */
    public function tasks()
    {
        return $this->hasManyThrough(\App\Task::class, \App\Project::class);
    }
}
