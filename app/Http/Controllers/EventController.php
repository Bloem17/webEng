<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateEventRequest;
use \App\Models\Reise;
use \App\Models\Rechnung;
use View;
use Auth;
use Illuminate\Pagination\Paginator;


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
        $events = Reise::paginate(10);

        if (Auth::check()){
            return View::make('event.events')->with('events', $events);
        }
    }

    public function store(CreateEventRequest $request){

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
        $datum = $request->datum;

        $date = new \DateTime($datum);
        $newDate = date_format($date, 'd-m-Y');

        $reise->datum = $newDate;

		$reise->save();
		return redirect()->to('/events');

    }

  	public function create (){

		return View::make('event.create');

    }


    public function show (Reise $reise){

        
        $rechnungen = $reise->rechnung()->paginate(10, ['*'], 'rechnungen');
        $teilnehmer = $reise->teilnehmer()->paginate(10, ['*'], 'teilnehmer');
        

        return View::make('event.show')
        ->with('event', $reise)
        ->with('rechnungen', $rechnungen)->with('teilnehmer', $teilnehmer);

    }

  



}
 