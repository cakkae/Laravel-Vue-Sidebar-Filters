<?php
namespace App\Http\Controllers\Api;

use Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()  {
        return \Cart::session($this->user->id)->getContent();
    }

    public function add(Request $request){
        dd(auth()->guard('api')->user());
        \Cart::session()->add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->qty,
        ));
        return response()->json("ok");
    }

    public function remove(Request $request){
        \Cart::session($this->user->id)->remove($request->id);
        return \Cart::session($this->user->id)->getContent();
    }

    public function update(Request $request){
        \Cart::session($this->user->id)::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return \Cart::session($this->user->id)->getContent();
    }

    public function clear(){
        \Cart::session($this->user->id)->clear();
        return \Cart::session($this->user->id)->getContent();
    }

}
