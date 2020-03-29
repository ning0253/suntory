<?php

namespace App\Http\Controllers;

use App\LiqueurImg;
use App\LiqueurSure;
use App\LiqueurStory;
use App\LiqueurMethod;
use App\LiqueurProduct;
use App\LiqueurAttitude;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{

    public function product_list()
    {
        $products_data = LiqueurProduct::orderBy('sort', 'desc')->get();
        return view('fronts/product_list', compact('products_data'));
    }


    public function Yamasaki($id)
    {

        $stories = LiqueurStory::find($id)->orderBy('sort','desc')->get();
        $attitudes = LiqueurAttitude::find($id)->orderBy('sort','desc')->get();
        $products = LiqueurProduct::find($id)->orderBy('sort','desc')->get();
        $methods = LiqueurMethod::find($id)->orderBy('sort','desc')->get();
        $sures = LiqueurSure::find($id)->orderBy('sort','desc')->get();
        $banners = LiqueurImg::find($id)->orderBy('sort','desc')->get();




        // dd($stories);

        return view('Yamasaki', compact('stories','attitudes','products','methods','sures','banners'));
    }
}
