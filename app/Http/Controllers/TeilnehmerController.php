<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Teilnehmer;
use App\models\Reise;
use View;

class TeilnehmerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Reise $reise){

    	return View::make('teilnehmer.create')->with('event', $reise);

    }

    public function store(Request $request, Reise $reise){

        
        if($reise->teilnehmer()->count() < 20){

            $teilnehmer = new Teilnehmer;

            $teilnehmer->vorname = $request->vorname;
            $teilnehmer->nachname = $request->nachname;
            $teilnehmer->strasse = $request->strasse;
            $teilnehmer->strNr = $request->strNr;
            $teilnehmer->ort = $request->ort;
            $teilnehmer->plz = $request->plz;

            $reise->teilnehmer()->save($teilnehmer);
            \Session::flash('message', 'Teilnehmer erfolgreich hinzugefügt'); 
            return back();

        }else{
            \Session::flash('message', 'Bereits 20 Teilnehmer erfasst!'); 
            return back();
        }


        

    	

    	

    }
}
