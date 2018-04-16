<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = ['id'];

    /**
     * Return project's tasks.
     *
     * @return Relationship
     */
    public function tasks()
    {
        return $this->hasMany(\App\Task::class);
    }

    /**
     * Return project's group.
     *
     * @return Relationship
     */
    public function group()
    {
        return $this->belongsTo(\App\Group::class);
    }

    /**
     * Return project's users.
     *
     * @return Relationship
     */
    public function users()
    {
        return $this->belongsToMany(\App\User::class, 'project_role_user')->withPivot('role_id');
    }
}
