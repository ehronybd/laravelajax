<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class productController extends Controller
{
   public function products(){
       $products =Product::latest()->paginate(5);


   return view('show',compact('products'));
   }
   //add product
   public function addProduct(Request $request){
       $request->validate(
       [
           'name' => 'required |unique:products',
           'price' => 'required',
       ],

       [
           'name.required'=>'Name Is Required',
           'name.unique'=>'Name Is Exists',
           'price.required'=>'Price Is Required',
       ]
     
       );

       $pruduct = new Product();
       $pruduct->name = $request->name;
       $pruduct->price = $request->price;
       $product->save();
       return response()->json([
           'status'=>'Success',
       ]);
   }

   //update product
      public function updateProduct(Request $request){
       $request->validate(
       [
           'up_name' => 'required |unique:products,name,'.$request->up_id,
           'up_price' => 'required',
       ],

       [
           'up_name.required'=>'Name Is Required',
           'up_name.unique'=>'Name Is Exists',
           'up_price.required'=>'Price Is Required',
       ]
     
       );

       Product::where('id',$request->up_id)->update([
           'name'=>$request->up_name,
           'price'=>$request->up_price,
       ]);
      
       return response()->json([
           'status'=>'Success',
       ]);
   }

      //delete product
      public function deleteProduct(Request $request){
          Product::find($request->product_id)->delete();
      
       return response()->json([
           'status'=>'Success',
       ]);
   }

      //paginate product
      public function paginateProduct(Request $request){

         $products =Product::latest()->paginate(5);


           return view('pagination_product',compact('products'))->render();

   }

   //Search Product
    public function searchProduct(Request $request){

        $product=Product::where('name','like','%'.$request->search_product.'%')
        ->orWhere('price','like','%'.$request->search_product.'%')
        ->orderBy('id','desc')
        ->paginate(5);

        if($product->count() >=1 ){
            return view('pagination_product',compact('products'))->render();

        }else{
            return response()->json([

            'status'=>'Nothing Found',

            ]);

        }


    }




}
