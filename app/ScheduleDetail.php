<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleDetail extends Model
{
    //
    protected $fillable = ['name','time'];
    
    public function schedule()
    {
        return $this->belongsTo('App\Schedule');
    }
}
