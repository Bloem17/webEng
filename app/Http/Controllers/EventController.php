<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateEventRequest;
use App\Models\Reise;
use App\Models\Rechnung;
use View;
use Auth;
use Session;
use Illuminate\Pagination\Paginator;


class EventController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }


    //

	public function index(){

        return View::make('event.home');

	}

    public function create (){

        

        return View::make('event.create');

    }

    public function events(){

        $events = Reise::paginate(10);

        return View::make('event.events')->with('events', $events);
        
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
		$reise->preis = round($request->preis, 2);
		$reise->status = true;
        $datum = $request->datum;

        

        $date = new \DateTime($datum);
        $newDate = date_format($date, 'd.m.Y');

        $reise->datum = $newDate;

		$reise->save();
        \Session::flash('message', "Reise '$reise->titel' wurde erfolgreich erfasst"); 
        Session::flash('css', 'success');
		return redirect()->to('/events');

    }




    public function show (Reise $reise){

        
        $rechnungen = $reise->rechnung()->paginate(10, ['*'], 'rechnungen');
        $teilnehmer = $reise->teilnehmer()->paginate(10, ['*'], 'teilnehmer');
        

        return View::make('event.show')
        ->with('event', $reise)
        ->with('rechnungen', $rechnungen)->with('teilnehmer', $teilnehmer);

    }

    public function edit(CreateEventRequest $request, Reise $reise){

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
        $newDate = date_format($date, 'd.m.Y');

        $reise->datum = $newDate;

        $reise->save();

        Session::flash('message', "Reise '$reise->titel' wurde erfolgreich angepasst");
        Session::flash('css', 'success');
        return back();

    }


    public function destroy (Reise $reise){

        
        $reise->delete();
        $reise->rechnung()->delete();
        $reise->teilnehmer()->delete();

        // redirect
        Session::flash('message', 'Reise wurde erfolgreich gelöscht');
        Session::flash('css', 'info');
        return redirect()->to('/events');
    }

  



}
 