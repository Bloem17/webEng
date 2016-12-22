<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reise extends Model
{
    //
    protected $table = 'event';

    protected $fillable = ['titel',
						   'dauer',
						   'kurzbeschrieb',
						   'tag1',
						   'tag2',
						   'tag3',
						   'tag4',
						   'tag5',
						   'tag6',
						   'tag7',
						   'preis',
						   'datum'];
    

    

    //Reise kann viele Rechnungen haben
    public function rechnung(){

    	return $this->hasMany('App\Models\Rechnung');

    }

    public function teilnehmer(){

    	return $this->hasMany('App\Models\Teilnehmer');

    }

}
