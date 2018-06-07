<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Message extends Model
{
    protected $fillable = ['from', 'to', 'message'];

    public function sender()
    {
	return $this->belongsTo(User::class, 'from', 'id');
    }

    public function receiver()
    {
	return $this->belongsTo(User::class, 'to', 'id');
    }
}
