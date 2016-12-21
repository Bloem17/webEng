<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Rechnung;
use \App\Models\Reise;
use Illuminate\Support\Collection;
use View;

class RechnungController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Reise $reise){

    	return View::make('rechnung.create')->with('event', $reise);

    }

    public function store(Request $request, Reise $reise){


    	$rechnung = new Rechnung;

    	$rechnung->rechnungsNr = $request->rechnungsNr;
    	$rechnung->betrag = $request->betrag;
    	$rechnung->rechnungstyp = $request->selectRtyp;

    	$reise->rechnung()->save($rechnung);

        \Session::flash('message', "Rechnung '$rechnung->rechnungsNr' erfolgreich hinzugefügt");
        \Session::flash('css', 'success'); 
    	return back();
    }

    public function show(Rechnung $rechnung){

        $reise = Reise::find($rechnung->reise_id);

        return View::make('rechnung.show')
        ->with('rechnung', $rechnung)
        ->with('titel', $reise->titel);

    }

    public function edit(Request $request, Rechnung $rechnung){

        $reise = Reise::find($rechnung->reise_id);

        $rechnung->rechnungsNr = $request->rechnungsNr;
        $rechnung->betrag = $request->betrag;
        $rechnung->rechnungstyp = $request->selectRtyp;

        $reise->rechnung()->save($rechnung);

        \Session::flash('message', "Rechnung '$rechnung->rechnungsNr' erfolgreich angepasst");
        \Session::flash('css', 'success'); 
        return back();
    }

    public function destroy(Rechnung $rechnung){

        $rechnung->delete();

        // redirect
        \Session::flash('message', 'Rechnung wurde erfolgreich gelöscht');
        \Session::flash('css', 'info');
        return back();

    }



        public function abrechnung(Reise $reise){



        $gesamtbetrag = 0;

        $teilnehmer = $reise->teilnehmer()->count();
        $presi = $reise->preis;

        $betrag = $presi * $teilnehmer;

        $hr = array();
        $rv = array();
        $ck = array();
        $essen = array();
        $ek = array();


        foreach ($reise->rechnung as $rechnung){
            if ($rechnung->rechnungstyp =='hotelrechnung') {
            $hr[]=$rechnung;
            } elseif ($rechnung->rechnungstyp =='reiseversicherung') {
                $rv[]=$rechnung;
            } elseif ($rechnung->rechnungstyp =='carkosten') {
                $ck[]=$rechnung;
            } elseif ($rechnung->rechnungstyp =='essen') {
                $essen[]=$rechnung;
            } elseif ($rechnung->rechnungstyp =='eventkosten') {
                $ek[]=$rechnung;
            }
        

        $gesamtbetrag += $rechnung->betrag;

      }



       $pdf = \PDF::loadView('static.pdf', compact('gesamtbetrag', 'reise', 'betrag', 'teilnehmer', 'hr', 'rv', 'ck', 'essen','ek'));
       return $pdf->stream();
        
    }
    



    


}
