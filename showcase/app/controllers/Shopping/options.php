<?php

namespace App\Http\Controllers\Shopping;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\shopping\security;
use App\models\shopping\users;
use DB;
use Session;

class options extends Controller
{
    public function __construct(){
    	$this->data = [];
        $this->security = new security();
        $this->user = new users;
    }

    public function logout(){
    	$this->security->logout();

    	return redirect('/shopping');
    }
}
