<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //
    protected $fillable = ['date','trainer','location'];
    public function details()
    {
        return $this->hasMany('App\ScheduleDetail');
    }
}
