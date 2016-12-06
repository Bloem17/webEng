<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rechnung extends Model
{
    //
	protected $table = 'rechnung';

	//Rechnung ist einer Reise (Event) zugewiesen
	public function reise(){

		return $this->belongsTo('App\Models\Reise');

	}
}
