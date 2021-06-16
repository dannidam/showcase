<?php

namespace App\Http\Controllers\Shopping;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Redirect,Response,File;
use Intervention\Image\Facades\Image as Image;
use App\models\shopping\security;
use App\models\shopping\users;
use App\models\shopping\m_products;
use DB;
use Session;

class Products extends Controller
{
    public function __construct(){
    	$this->data = [];
        $this->security = new security();
        $this->user = new users();
        $this->product = new m_products();
    }

    public function main(){
    	$data = $this->data;
    	$data['loggedIn'] = $this->security->isLogged();
        if($data['loggedIn']){
            $data['user'] = $this->user->getUser();
            $data['products'] = $this->product->get_products();
            $group_id = $data['user']->group_id;
            $data['dListLink'] = "/shopping/daily_list=".$group_id;
            //get saved Products when data is added then test
            $data['dailyTempList'] = [];
            $total = 0;
            $tempData = $this->product->getTempListP($data['user']->group_id);

            foreach ($tempData as $t) {
                $mainData = $this->product->getTProducts($t->product_id);
                $finishedP = array(
                    'id' => $t->product_id,
                    'name' => $mainData->name,
                    'quantity' => $t->quantity,
                    'price' => $mainData->price * $t->quantity
                );

                $total += $finishedP['price'];

                array_push($data['dailyTempList'], $finishedP);
            }
            
            if($total > 0){
                $total = $this->addUpDown($total);
            }

            $data['total'] = $total;

            return view('Shopping/products', compact('data'));
        }
        else{
            return redirect('shopping/login');
        }
    }

    public function addUpDown($n){

        $whole = floor($n);
        $decimal = $n - $whole;
        
        if($decimal >= 0.75){
            $decimal = 1;
        }
        elseif($decimal >= 0.25 && $decimal < 0.75){
            $decimal = 0.50;
        }
        elseif($decimal < 0.25){
            $decimal = 0;
        }

        $n = $whole + $decimal;
        $n = number_format($n,2, '.', '');

        return $n;
    }

    public function addNew(){
        $data['loggedIn'] = $this->security->isLogged();
        if($data['loggedIn']){
            $data['user'] = $this->user->getUser();
            $group_id = $data['user']->group_id;
            $data['dListLink'] = "/shopping/daily_list=".$group_id;
            $data['cats'] = $this->product->getCats();
            $data['shops'] = $this->product->getShopNames();

            return view('Shopping/addProduct', compact('data'));
        }
        else{
            return redirect('shopping/login');
        } 
    }

    public function addTemp(){
        $p_id = request('add_product');
        $user = $this->user->getUser();
        $product = $this->product->getProduct($p_id);
        //data will contain product_id get neccesary info of this id before we add to DB
        $productData = array(
            'product_id' => $product->product_id,
            'user_add' => $user->username,
            'group' => $user->group_id,
            'status' => 1//if 1 daily list, 2 weekly list, 0 submitted(opted for deletion)
        );
        $this->product->uploadPToTemp($productData);

        return back()->withSuccess('Great! product has been successfully uploaded.');
    }

    public function deductTemp(){
        $id = request('deduct_product');
        $user = $this->user->getUser();
        $product = $product = $this->product->getTempP($id, $user->group_id);
        $this->product->deductFromTemp($product);


        return back()->withSuccess('Great! product has been successfully deducted.');
    }

    public function saveProduct(){
    	/*From request works next step is to validate & sanitize input - then send it - figure image upload out.*/

        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
       ]);

       if($files = request()->file('image')) {
            
            $destinationPath = 'shoppingImages'; // upload path
            //dd($destinationPath);
            $profileImageName = $files->getClientOriginalName();

            if($files->move($destinationPath, $profileImageName)){
                $this->makeThumb($destinationPath."/".$profileImageName, 250, 250);
                $product = (object)[];

                $product->category = request('category');
                $product->name = request('name');
                $product->brand = request('brand');
                $product->variant = request('variant');
                $product->price = request('price');
                $product->amount = request('amount');
                $product->discount = request('discount_price');
                $product->weight = request('weight_type');
                $product->image_url = $profileImageName;
                $product->shop = request('shop');

                $this->storeProduct($product);
            }
        }

        return back()->withSuccess('Great! product has been successfully uploaded.');
    }

    public function storeProduct($product){
        //save product to DB.

        DB::table('shopping_products')->insert([
            'product_id' => $this->product->create_product_id($product),
            'category' => $product->category,
            'name' => $product->name,
            'variation' => $product->variant,
            'price' => $product->price,
            'amount' => $product->amount,
            'volume_type' => $product->weight,
            'discount_price' => $product->discount,
            'brand' => $product->brand,
            'image_url' => $product->image_url,
            'shop' => $product->shop,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }

    function makeThumb($src, $ht = 250, $wt = 250){
        $img = Image::make($src);

        $img->resize($ht, $wt);

        $img->save($src);
    }
}
