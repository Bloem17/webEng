<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
