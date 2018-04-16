<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    public $timestamps = false;

    /**
     * Return tasks with this tag.
     *
     * @return Relationship
     */
    public function tasks()
    {
        return $this->belongsToMany(\App\Task::class);
    }
}
