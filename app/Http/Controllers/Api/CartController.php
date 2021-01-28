<?php
namespace App\Http\Controllers\Api;

use Auth;
use App\Product;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()  {
        $user = User::where('id',1);
        return CartResource($this->user);
    }

    public function add(Request $request){
        $user = User::where('id',1)->get();
        \Cart::session($user->first()->id)->add(array(
            'id' => '1',
            'name' => 'TEst',
            'price' => 55,
            'quantity' => 44,
        ));
        return CartResource::collection($user);
    }

    public function remove(Request $request){
        \Cart::remove($request->id);
        $cartCollection = \Cart::getContent();
        return CartResource::collection($cartCollection);
    }

    public function update(Request $request){
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        $cartCollection = \Cart::getContent();
        return CartResource::collection($cartCollection);
    }

    public function clear(){
        \Cart::clear();
        $cartCollection = \Cart::getContent();
        return CartResource::collection($cartCollection);
    }

}