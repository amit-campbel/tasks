<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title', 'description', 'type', 'status', 'assigned_to', 'created_by', 'updated_by'
    ];

    public function creator() {
    	return $this->belongsTo('App\User', 'created_by');
    }

    public function assignedTo() {
    	return $this->belongsTo('App\User', 'assigned_to');
    }

    public function comments() {
    	return $this->hasMany('App\Comment');
    }

    //Other Methods

    public function checkEditAccess($user) {
    	if($user->id == $this->assigned_to || $user->id == $this->created_by || $user->isAdmin()) {
    		return true;
    	}

    	return false;
    }
}
