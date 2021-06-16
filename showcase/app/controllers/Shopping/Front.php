<?php

namespace App\Http\Controllers\Shopping;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\shopping\security;
use App\models\shopping\users;
use DB;
use Session;

class Front extends Controller
{
    public function __construct(){
    	$this->data = [];
        $this->security = new security();
        $this->user = new users;
    }

    public function main(){
    	$data = $this->data;
    	$data['loggedIn'] = $this->security->isLogged();
        if($data['loggedIn']){
            $data['user'] = $this->user->getUser();
            $group = $data['user']->group_id;
            $data['dListLink'] = "/shopping/daily_list=".$group;
            $data['latestProducts'] = $this->getLatestProducts(5);
            //commented out lines are our call to create users if new are needed in the future.
            /*$this->security->createUser('dannidamholmen@gmail.com', 'danni', '1', 'Danie1982');
            $this->security->createUser('rosaireneandersen@gmail.com', 'rosa', '1', 'bolandsvej16');*/

            return view('Shopping/front', compact('data'));
        }
        else{
            return redirect('shopping/login');
        }
        
    }

    public function getLatestProducts($num){
        $latestProducts = DB::table('shopping_products')->limit($num)->get();

        return $latestProducts;
    }
}
