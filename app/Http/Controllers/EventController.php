<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Reise;
use View;


class EventController extends Controller {


    //

	public function index(){

		$events = Reise::all();

		return View::make('event.index')->with('events', $events);


	}

    public function store(Request $request){

    	$reise = new Reise;

    	$reise->titel = $request->titel;
    	$reise->dauer = $request->select;
    	$kurzbeschrieb = "";

    	for ($i=1; $i <= 7; $i++ ){
    		$check = 'tag' . $i;
    		if (!empty($request->$check)){
			 	$kurzbeschrieb .= $request->$check . " | ";
    		}
    	}

    	$reise->kurzbeschrieb = $kurzbeschrieb;
		$reise->preis = $request->preis;
		$reise->status = true;

		$reise->save();
		return redirect()->to('/');

    }

  	public function create (){

		return View::make('event.create');

    }


    public function show (){

    }

  



}
 