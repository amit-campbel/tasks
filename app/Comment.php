<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'task_id', 'comment', 'reminder_date', 'created_by', 'updated_by'
    ];

    public function creator() {
    	return $this->belongsTo('App\User', 'created_by');
    }

    public function task() {
    	return $this->belongsTo('App\Task');
    }

    //Other Methods

    public function checkEditAccess($user) {
    	if($user->id == $this->created_by || $user->isAdmin()) {
    		return true;
    	}

    	return false;
    }
}
