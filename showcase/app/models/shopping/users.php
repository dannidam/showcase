<?php

namespace App\models\shopping;

use Illuminate\Database\Eloquent\Model;
use Session;
use DB;

class users extends Model
{
    public function getUser(){
    	$name = Session('shopping_user');
    	$user = DB::table('shopping_users')->where('username', $name)->first();

    	return $user;
    }
}
