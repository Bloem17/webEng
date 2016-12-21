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

    public function show (Teilnehmer $teilnehmer){

        $reise = Reise::find($teilnehmer->reise_id);

        return View::make('teilnehmer.show')
        ->with('teilnehmer', $teilnehmer)
        ->with('titel', $reise->titel)
        ->with('id', $reise->id)
        ->with('datum', $reise->datum);
        ;
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
            \Session::flash('css', 'success'); 
            return back();

        }else{
            \Session::flash('message', 'Bereits 20 Teilnehmer erfasst!'); 
            \Session::flash('css', 'warning');
            return back();
        }


    }

    public function edit(Request $request, Teilnehmer $teilnehmer){

        $reise = Reise::find($teilnehmer->reise_id);

        $teilnehmer->vorname = $request->vorname;
        $teilnehmer->nachname = $request->nachname;
        $teilnehmer->strasse = $request->strasse;
        $teilnehmer->strNr = $request->strNr;
        $teilnehmer->ort = $request->ort;
        $teilnehmer->plz = $request->plz;

        $reise->teilnehmer()->save($teilnehmer);

        $reise->teilnehmer()->save($teilnehmer);
        \Session::flash('message', 'Teilnehmer erfolgreich angepasst');
        \Session::flash('css', 'success'); 
        return back();

    }

     public function destroy(Teilnehmer $teilnehmer){

        $teilnehmer->delete();

        // redirect
        \Session::flash('message', 'Teilnehmer wurde erfolgreich gelöscht');
        \Session::flash('css', 'info');
        return back();

    }
}
