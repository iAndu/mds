<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = ['id'];

    /**
     * Return comment's owner.
     *
     * @return Relationship
     */
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    /**
     * Return comment's task.
     *
     * @return Relationship
     */
    public function task()
    {
        return $this->belongsTo(\App\Task::class);
    }
}
