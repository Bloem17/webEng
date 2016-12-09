<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Teilnehmer;
use App\models\Reise;
use View;

class TeilnehmerController extends Controller
{
    //

    public function create(Reise $reise){

    	return View::make('teilnehmer.create')->with('event', $reise);

    }

    public function store(Request $request, Reise $reise){

    	$teilnehmer = new Teilnehmer;

    	$teilnehmer->vorname = $request->vorname;
    	$teilnehmer->nachname = $request->nachname;
    	$teilnehmer->strasse = $request->strasse;
    	$teilnehmer->strNr = $request->strNr;
    	$teilnehmer->ort = $request->ort;
    	$teilnehmer->plz = $request->plz;

    	$reise->teilnehmer()->save($teilnehmer);

    	return back();

    	

    }
}
