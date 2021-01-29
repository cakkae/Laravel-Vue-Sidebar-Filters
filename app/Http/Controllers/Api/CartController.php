<?php
namespace App\Http\Controllers\Api;

use Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class CartController extends Controller
{
    public function cart(Request $request)  {
        return \Cart::session($request->user)->getContent();
    }

    public function add(Request $request){
        $product = Product::where('id', $request->id)->get();
        if($product->first()->quantity >= $request->quantity)
        {
            \Cart::session($request->user)->add(array(
                'id' => $request->id,
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
            ));
            return response()->json(['status' => true, 'message' => 'Proizvod uspjesno dodan']);
        } else {
            return response()->json(['status' => false, 'message' => 'Nema dovoljno na stanju!']);
        }
    }

    public function remove(Request $request){
        \Cart::session($request->user)->remove($request->id);
        return response()->json("Ok");
    }

    public function update(Request $request){
        $product = Product::where('id', $request->id)->get();
        if($product->first()->quantity >= $request->quantity)
        {
            \Cart::session($request->user)->update($request->id,[
                'quantity' => $request->quantity
            ]);
            return response()->json(['status' => true, 'message' => 'Proizvod uspjesno dodan']);
        }
        else {
            return response()->json(['status' => false, 'message' => 'Nema dovoljno na stanju!']);
        }
    }

    public function clear(){
        \Cart::session($request->user)->clear();
        return response()->json("Ok");
    }

}
