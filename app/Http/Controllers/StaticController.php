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

public function index(){

	if(\Auth::guest()){

        return redirect('/login');

	}else{

		return View::make('event.home');

	}

 }
}
