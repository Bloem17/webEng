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

        //echo "Teilnehmer: " . $teilnehmer . " * " . $presi . "=" . $betrag; 

       $pdf = \PDF::loadView('static.pdf', compact('gesamtbetrag', 'reise', 'betrag', 'teilnehmer', 'hr', 'rv', 'ck', 'essen','ek'));
       return $pdf->stream();
        
    }
    



    


}
