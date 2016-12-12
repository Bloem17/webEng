<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Reise;
use \App\Models\Rechnung;
use View;
use Auth;


class EventController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }


    //

	public function index(){

        if (Auth::check()){
            return View::make('event.home');
        }

	}

    public function events(){
        $events = Reise::all();//Select * from event;

        if (Auth::check()){
            return View::make('event.events')->with('events', $events);
        }
    }

    public function store(Request $request){

    	$reise = new Reise;

    	$reise->titel = $request->titel;
    	$reise->dauer = $request->select;
        $kurzbeschrieb = '';

        
    	for ($i=1; $i <= 7; $i++ ){
    		$check = 'tag' . $i;
    		if (!empty($request->$check)){
			 	$kurzbeschrieb .= $request->$check . " | ";
    		}
    	}

        for ($i=1; $i <= 7; $i++ ){
            $check = 'tag' . $i;
            if (!empty($request->$check)){

                $reise->$check = $request->$check;

            }
        }

        $reise->kurzbeschrieb = $kurzbeschrieb;
		$reise->preis = $request->preis;
		$reise->status = true;
        $reise->datum = $request->datum;

		$reise->save();
		return redirect()->to('/events');

    }

  	public function create (){

		return View::make('event.create');

    }


    public function show (Reise $reise){


        return View::make('event.show')->with('event', $reise);

    }

  



}
 