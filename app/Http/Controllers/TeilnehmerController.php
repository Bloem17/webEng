<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Teilnehmer;
use View;

class TeilnehmerController extends Controller
{
    //

    public function create(){

    	return View::make('teilnehmer.create');

    }
}
