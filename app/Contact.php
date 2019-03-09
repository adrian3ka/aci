<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name', 'phone_number'];
    
	public function candidate_users () {
        return $this->belongsToMany('App\Contact', 'candidate_user_contact');
    }
}
