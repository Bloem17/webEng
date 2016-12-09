<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reise extends Model
{
    //
    protected $table = 'event';

    

    //Reise kann viele Rechnungen haben
    public function rechnung(){

    	return $this->hasMany('App\Models\Rechnung');

    }

    public function teilnehmer(){

    	return $this->hasMany('App\Models\Teilnehmer');

    }

}
