<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Rechnung;
use \App\Models\Reise;
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

        foreach ($reise->rechnung as $rechnung){

            $gesamtbetrag += $rechnung->betrag;

        }

        return $gesamtbetrag;

    }


}
