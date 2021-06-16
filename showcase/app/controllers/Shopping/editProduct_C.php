<?php

namespace App\Http\Controllers\Shopping;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Redirect,Response,File;
use Intervention\Image\Facades\Image as Image;
use App\models\shopping\security;
use App\models\shopping\users;
use App\models\shopping\m_products;
use App\models\shopping\editProduct;
use DB;
use Session;

class editProduct_C extends Controller
{
    public function __construct(){
    	$this->data = [];
        $this->security = new security();
        $this->user = new users();
        $this->product = new m_products();
        $this->e_product = new editProduct();
    }

    public function main($id){
    	$data = $this->data;
    	$data['loggedIn'] = $this->security->isLogged();

    	if($data['loggedIn']){
    		$data['user'] = $this->user->getUser();
            $group = $data['user']->group_id;
            $data['dListLink'] = "/shopping/daily_list=".$group;
            $data['product'] = $this->e_product->getProduct($id);
            $data['cats'] = $this->product->getCats();
            

    		return view('Shopping/editProduct', compact('data'));
    	}
        else{
            return redirect('shopping/login');
        }
    }

    public function updateProd(){
        //get product for safety
        $prod = DB::table('shopping_products')->where('product_id', request('prodId'))->first();
        //update product
        if(request('name') != null || request('name') != '')
            $name = request('name');
        else
            $name = $prod->name;

         if(request('category') != null || request('category') != '')
            $category = request('category');
        else
            $category = $prod->category;

        if(request('variation') != null || request('variation') != '')
            $variation = request('variation');
        else
            $variation = $prod->variation;

        if(request('price') != null || request('price') != '')
            $price = request('price');
        else
            $price = $prod->price;

        if(request('amount') != null || request('amount') != '')
            $amount = request('amount');
        else
            $amount = $prod->amount;

        if(request('volume_type') != null || request('volume_type') != '')
            $volume_type = request('volume_type');
        else
            $volume_type = $prod->amount;

        DB::table('shopping_products')
            ->where('product_id', request('prodId'))
            ->update([
                'name' => $name,
                'category' => $category,
                'variation' => $variation,
                'price' => $price,
                'amount' => $amount,
                'volume_type' => $volume_type,
                'updated_at' => \Carbon\Carbon::now()
            ]);
        
        return back()->withSuccess('Great! product has been successfully updated.');   
    }
}
