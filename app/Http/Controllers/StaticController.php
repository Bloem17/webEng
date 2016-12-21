<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Requests\CreateTestRequest;
use App\models\Teilnehmer;
use App\models\Reise;
use App\models\User;
use View;


class StaticController extends Controller
{
    //
 
 public function show(){

    if(\Auth::guest()){

        return View::make('static.about');

    }else{

        return redirect('/');
    }
 }

}
