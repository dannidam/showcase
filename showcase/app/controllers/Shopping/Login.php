<?php

namespace App\Http\Controllers\Shopping;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\shopping\security;
use Session;

class Login extends Controller
{
	public function __construct(){
    	$this->data = [];
        $this->security = new security();
    }

    public function main(){
    	$data = $this->data;
    	$data['loggedIn'] = '';
        //commented out lines are our call to create users if new are needed in the future.
        /*$this->security->createUser('dannidamholmen@gmail.com', 'danni', '1', 'Danie1982');
        $this->security->createUser('rosaireneandersen@gmail.com', 'rosa', '1', 'bolandsvej16');*/

    	return view('Shopping/login', compact('data'));
    }

    public function manageLogin(){
        //post and sanitize login data = if posted data is correct -> add data to session
        //$usernameInput = request('username');
        //$passwordInput = request('password');

        $authorized = $this->security->checkCredentials(request('username'), request('password'));

        if($authorized){
            Session::put('shopping_user', request('username'));
            return redirect('shopping');
        }
        else{
            return back(); //lets do this with a messsage next time..
        }
    }

    public function manageLogout(){
        Session::forget('shopping_user');
        return back();
    }
}
