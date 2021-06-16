<?php

namespace App\models\shopping;

use Illuminate\Database\Eloquent\Model;
use Session;
use DB;

class security extends Model
{
	public function createUser($email, $name, $group, $pass){
		$remembertoken = $this->genSalt();
		$pass = $this->hashSecret($remembertoken, $pass);

		$exists = DB::table('shopping_users')->where('email', $email)->first();

		if(!$exists){
			DB::table('shopping_users')->insert([
				'email' => $email,
				'username' => $name,
				'group_id' => $group,
				'password' => $pass,
				'remembertoken' => $remembertoken,
				"created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
			]);
		}
	}

    public function genSalt(){
        
		$salt = uniqid(mt_rand(), true) . sha1(uniqid(mt_rand(), true));
		$salt = substr($salt, 0, 22);
		return $salt;
	}

    public function hashSecret($remembertoken, $pass){

        $hash = crypt('sha512', $pass);
    	$hash = sha1($remembertoken.$hash);
        $newHash = [];
        for($i = 0; $i < strlen($hash); $i++){
            if($i%4 == 0){
                array_push($newHash, $hash[$i]);
            }
        }
        $newHash = implode($newHash);
    	return $newHash;
    }

    public function secretUser($user){

    	$token = $this->genSalt();
    	$hash = crypt('sha512', $user);
    	$hash = sha1($token.$hash);
        
    	return $hash;

    	return $user;
    }

    public function getToken($username, $table){
        //while this is simple and has limited users username is fine otherwise email would be a better search criteria.
        $token = DB::table($table)->where('username', $username)->select('remembertoken')->get();
        return $token;
    }

    public function checkCredentials($name, $pass){
    	//check information against DB and return true if correct or false if not

    	$user = DB::table('shopping_users')->where('username', $name)->first();

    	if($user){
    		$token = $user->remembertoken;
    		$pass = $this->hashSecret($token, $pass);

    		if($pass == $user->password){
    			return true;
    		}
    		else{
    			return false;
    		}
    	}
    }

    public function isLogged(){
    	if(Session::has('shopping_user')){
    		return true;
    	}
    }

    public function logout(){
        Session::forget('shopping_user');
    }
}
