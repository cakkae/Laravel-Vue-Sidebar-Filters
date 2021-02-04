<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth, PDF;
use App\Order;

class CheckoutController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $items = \Cart::session($user)->getContent();
        $pdv = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'PDV 17%',
            'type' => 'tax',
            'target' => 'total',
            'value' => '17%'
        ));
        $shipping = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'Dostava',
            'type' => 'shipping',
            'target' => 'total',
            'value' => '+10'
        ));
        \Cart::session($user)->condition($pdv);
        \Cart::session($user)->condition($shipping);
        $getSubTotal = \Cart::session($user)->getSubTotal();
        $getTotal = \Cart::session($user)->getTotal();
        return view('checkout.index', compact('items', 'getSubTotal', 'getTotal', 'pdv', 'shipping'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $items = \Cart::session($user->id)->getContent();
        $pdv = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'PDV 17%',
            'type' => 'tax',
            'target' => 'total',
            'value' => '17%'
        ));
        $shipping = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'Dostava',
            'type' => 'shipping',
            'target' => 'total',
            'value' => '+10'
        ));
        \Cart::session($user->id)->condition($pdv);
        \Cart::session($user->id)->condition($shipping);
        $getSubTotal = \Cart::session($user->id)->getSubTotal();
        $getTotal = \Cart::session($user->id)->getTotal();
        $address = $request->address;
        $zip = $request->zip;
        $city = $request->city;
        $country = $request->country;
        $company = $request->company;
        $phone = $request->phone;
        $pdf = PDF::loadView('reports.invoice', compact('phone', 'company', 'user', 'address', 'city', 'zip', 'country', 'items', 'pdv', 'shipping', 'getSubTotal', 'getTotal'));
        $filename = \Carbon\Carbon::now()->timestamp.$user->id;
        \Storage::put($filename.'.pdf', $pdf->output());
        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->address = $request->address;
        $order->filename = $filename;
        return $pdf->stream($filename.'.pdf');
    }
}
