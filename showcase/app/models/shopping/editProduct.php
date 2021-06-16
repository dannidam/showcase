<?php

namespace App\models\shopping;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;

class editProduct extends Model
{
    public function getProduct($id){
    	$product = DB::table('shopping_products')->where('product_id', $id)->first();

    	return $product;
    }
}
