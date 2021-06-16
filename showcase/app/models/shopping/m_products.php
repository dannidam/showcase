<?php

namespace App\models\shopping;

use Illuminate\Database\Eloquent\Model;
use Session;
use DB;

class m_products extends Model
{
    public function get_products(){
        //later use parameter so that we can get specific product for now just fire all.
        $allProducts = DB::table('shopping_products')->get();

        return $allProducts;
    }

    public function getProduct($id){
        $product = DB::table('shopping_products')->where('product_id', $id)->first();

        return $product;
    }

    public function uploadPToTemp($data){
        //first Check if data exists if so update quantity = quantity + 1 else insert new item
        $checkItem = DB::table('shopping_tListItems')
        ->where('product_id', $data['product_id'])
        ->where('group', $data['group'])
        ->where('status', '!=', 0)
        ->first();

        if($checkItem){
            //update quantity, find product & group
            $newQuan = $checkItem->quantity + 1;
             DB::table('shopping_tListItems')
             ->where('product_id', $data['product_id'])
             ->where('group', $data['group'])
             ->update(['quantity' => $newQuan]);
        }
        else{
            //insert new row
            DB::table('shopping_tListItems')->insert([
                'product_id' => $data['product_id'],
                'quantity' => 1,
                'user_add' => $data['user_add'],
                'group' => $data['group'],
                'status' => $data['status'],
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);
        }

        return true;

    }

    public function getTempListP($group){
        $products = DB::table('shopping_tListItems')
        ->where('group', $group)
        ->get();

        return $products;
    }

    public function setTempToList($userData, $productData){
        
    }

    public function getTProducts($p_id){
        $product = DB::table('shopping_products')->where('product_id', $p_id)->first();

        return $product;
    }

    public function getTempP($p_id, $group){
        $product = DB::table('shopping_tListItems')
        ->where('product_id', $p_id)
        ->where('group', $group)
        ->first();

        return $product;
    }

    public function deductFromTemp($data){
        $p_id = $data->product_id;
        $group = $data->group;
        $newquantity = $data->quantity - 1;

        DB::table('shopping_tListItems')
        ->where('product_id', $p_id)
        ->where('group', $group)
        ->update(['quantity' => $newquantity]); 

    }

    public function getCats(){
        $cats = ['kød','grønt','krydderier','slik','energidrik','sodavand','mejeri','kolonial','diverse', 'Personlig pleje'];

        return $cats;
    }

    public function getShopNames(){
        $shopnames = ['Netto','fakta','Rema1000','Bilka','Grønthandler'];

        return $shopnames;
    }

    public function create_product_id(){
        $product_id = '000000000';
        $num = DB::table('shopping_products')->count() + 1;
        $product_id .= $num;
        $product_id = substr($product_id, -9);
        

        return utf8_encode($product_id);
    }
}
