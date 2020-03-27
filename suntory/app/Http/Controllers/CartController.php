<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addcart(Request $request){
        $data= $request->all();
        \Cart::add(array(
            'id' => $data['id'], // inique row ID
            'name' => $data['title'],
            'price' => $data['price'],
            'quantity' => 1,
            'attributes' => array()
        ));
        return 'successful';
    }

    public function getContent()
    {
        $content = \Cart::getTotal();
        return $content;
    }

    public function TotalCart()
    {
        $total = \Cart::getContent();
        return $total;
    }
    public function onChange()
    {

        $total = \Cart::update(456, array(
            'quantity' => array(
                'relative' => false,
                'value' => 5
            ),
        ));
        return $total;
    }
}
