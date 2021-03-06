<?php

namespace App;

use Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'identity_number', 'date_of_birth','address',
        'height','weight', 'blood_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected $dates = [
        'date_of_birth',
    ];
    
    
	public function hobbies () {
        return $this->belongsToMany('App\MasterHobby', 'user_master_hobby');
    }
	public function contacts () {
        return $this->belongsToMany('App\Contact', 'user_contact');
    }
    
    public function getGenderAttribute($value){
        if ($value == "M") {
            return "Pria";	
        } else {
            return "Wanita";	
        }
	}
	
	public function getDateOfBirthAttribute($value){
        return Carbon::parse($value);
	}
}
