<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $items = \Cart::session($user)->getContent();
        $pdv = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'PDV 17%',
            'type' => 'tax',
            'target' => 'total', // this condition will be applied to cart's subtotal when getSubTotal() is called.
            'value' => '17%'
        ));
        \Cart::session($user)->condition($pdv);
        $getSubTotal = \Cart::session($user)->getSubTotal();
        $getTotal = \Cart::session($user)->getTotal();
        return view('checkout.index', compact('items', 'getSubTotal', 'getTotal', 'pdv'));
    }
}
