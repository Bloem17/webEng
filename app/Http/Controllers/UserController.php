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

    public function show (){

        if(\Auth::user()->isAdmin == "true"){

            $users = User::paginate(10);
            return View::make('user.show')->with('users', $users);

        }else{

            return redirect('/'); 

        }  
      
    }

    public function create(){

        if(\Auth::user()->isAdmin == "true"){

    	   return View::make('user.create');
       }else{

            return redirect('/');

       }

    }

    public function store(Request $request){

        if(\Auth::user()->isAdmin == "true"){

                $rules = array(
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'passwort' => 'required',
                    'passwort1' => 'required',
                    'passwort' => 'same:passwort1|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',   
                );

            $validator = \Validator::make($request->all(), $rules);

            // process the login
            if ($validator->fails()) {
                
                return back()->withErrors($validator);

            } else {


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

        }else{

            return redirect ('/');

        }
    }

     public function destroy(User $user){

        if(\Auth::user()->isAdmin == "true"){

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
        }else{

            return redirect ('/');

        }

    }
}
