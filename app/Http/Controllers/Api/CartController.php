<?php
namespace App\Http\Controllers\Api;

use Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function __construct()
    {
        $user_id = 1;
        $this->user = User::where('id',$user_id)->get()->first();
    }

    public function cart()  {
        return \Cart::session($this->user->id)->getContent();
    }

    public function add(Request $request){
        \Cart::session($this->user->id)->add(array(
            'id' => '1',
            'name' => 'TEst',
            'price' => 55,
            'quantity' => 44,
        ));
        return \Cart::session($this->user->id)->getContent();
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
