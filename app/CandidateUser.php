<?php

namespace App;

use App\MasterHobby;
use Illuminate\Database\Eloquent\Model;

class CandidateUser extends Model
{
    protected $fillable = ['name','email','identity_number','date_of_birth',
	    'address','height','weight'];
	public function hobbies () {
        return $this->belongsToMany('App\MasterHobby', 'candidate_user_master_hobby');
    }
	public function contacts () {
        return $this->belongsToMany('App\Contact', 'candidate_user_contact');
    }
}
