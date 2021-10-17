<?php
// CONTROLLER CREATO DA DIEGO BERARDI
namespace giustiziapredittiva\Http\Controllers;

use Illuminate\Http\Request;
use giustiziapredittiva\DataLayer;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function getHome()
    {
        session_start();
        
        if(isset($_SESSION['logged'])){
            return view('index')->with('logged',true);
        } else{
            return view('index')->with('logged',false);
        }
    }
    
    public function authentication() {

        return view('auth.auth');
    }

    public function logout() {

        session_start();
        session_destroy();
        return Redirect::to(route('home'));
    }
    
    public function login(Request $request) {
        
        session_start();
        $dl = new DataLayer();
        // nome utente: admin; password: adminpwd
        if ($dl->validUser($request->input('username'), $request->input('password'))) 
        {
            $_SESSION['logged'] = true;
            $_SESSION['loggedName'] = $request->input('username');
            return Redirect::to(route('home'));
        }
       
        return view('errors.authErrorPage');
    }
}
