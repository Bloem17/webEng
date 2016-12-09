<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teilnehmer extends Model
{
    //
    protected $table = 'teilnehmer';

    public function reise(){

    	return $this->belongsTo('App\Models\Reise');


    }

}
