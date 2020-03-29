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

        $stories = LiqueurStory::orderBy('sort','desc')->get();
        $attitudes = LiqueurAttitude::orderBy('sort','desc')->get();
        $products = LiqueurProduct::orderBy('sort','desc')->get();
        $methods = LiqueurMethod::orderBy('sort','desc')->get();
        $sures = LiqueurSure::orderBy('sort','desc')->get();
        $banners = LiqueurImg::orderBy('sort','desc')->get();




        // dd($stories);

        return view('Yamasaki', compact('stories','attitudes','products','methods','sures','banners'));
    }
}
