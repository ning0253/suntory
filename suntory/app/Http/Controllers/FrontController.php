<?php

namespace App\Http\Controllers;

use App\LiqueurProduct;
use Illuminate\Http\Request;

class FrontController extends Controller
{

    public function product_list()
    {
        $products_data = LiqueurProduct::orderBy('sort', 'desc')->get();
        return view('fronts/product_list', compact('products_data'));
    }
}
