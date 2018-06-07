<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = ['id'];

    /**
     * Return users assigned to the task
     *
     * @return Relationship
     */
    public function users()
    {
        return $this->belongsToMany(\App\User::class);
    }

    /**
     * Return subtasks
     *
     * @return Relationship
     */
    public function subTasks()
    {
        return $this->hasMany(\App\Task::class);
    }

    /**
     * Return parent task
     *
     * @return Relationship
     */
    public function parentTask()
    {
        return $this->belongsTo(\App\Task::class);
    }

    /**
     * Return task's tags.
     *
     * @return Relationship
     */
    public function tags()
    {
        return $this->belongsToMany(\App\Tag::class);
    }

    /**
     * Return task's comments.
     *
     * @return Relationship
     */
    public function comments()
    {
        return $this->hasMany(\App\Comment::class);
    }

    /**
     * Return task's project.
     *
     * @return Relationship
     */
    public function project()
    {
        return $this->belongsTo(\App\Project::class);
    }
}
