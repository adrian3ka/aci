<?php

namespace App;

use App\CandidateUser;
use Illuminate\Database\Eloquent\Model;

class MasterHobby extends Model
{
    //
    protected $fillable = ['name'];
    public function candidate_users () {
        return $this->belongsToMany('CandidateUser', 'candidate_user_master_hobby');
    }
}
