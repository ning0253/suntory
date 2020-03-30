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


    public function Yamasaki()
    {
        $banners = LiqueurImg::find(1)->orderBy('sort','desc')->get();
        $stories = LiqueurStory::find(1)->orderBy('sort','desc')->get();
        $attitudes = LiqueurAttitude::find(1)->orderBy('sort','desc')->get();
        $products = LiqueurProduct::find(1)->orderBy('sort','desc')->get();
        $methods = LiqueurMethod::find(1)->orderBy('sort','desc')->get();
        $sures = LiqueurSure::find(1)->orderBy('sort','desc')->get();




        // dd($stories);

        return view('Yamasaki', compact('stories','attitudes','products','methods','sures','banners'));
    }
}
