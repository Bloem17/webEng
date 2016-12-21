<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Teilnehmer;
use App\models\Reise;
use App\models\User;
use View;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index (){

        $users = User::paginate(10);

        return View::make('user.show')->with('users', $users);
      
    }

    public function create(){

    	return View::make('user.create');

    }

    public function store(Request $request){

        $user = new User;

        if($request->passwort == $request->passwort1){

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->passwort);

            if($request->admin){
                $user->isAdmin = "true";
            }else{
                $user->isAdmin = "false";
            }

            $user->save();
            \Session::flash('message', "Benutzer '$user->name' wurde erfolgreich erfasst"); 
            \Session::flash('css', 'success');
            return redirect()->to('/dashboard');
            

        }else{
            \Session::flash('message', "Passwort stimmt nicht ueberein"); 
            \Session::flash('css', 'error');
            return back();
        }

       

    }

     public function destroy(User $user){

         if($user->isAdmin  == "true"){
            \Session::flash('message', "Admin benutzer koennen nicht geloescht werden"); 
            \Session::flash('css', 'error');
            return back();
        }else{
            $user->delete();
            \Session::flash('message', "Benutzer wurde erfolgreich geloescht"); 
            \Session::flash('css', 'info');
            return back();

        }

    }
}
