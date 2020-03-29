<?php

namespace App\Http\Controllers;

use App\LiqueurProduct;
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
        $stories = DB::table('liqueur_stroys')->orderBy('sort','desc')->get();
        $attitudes = DB::table('liqueur_attitudes')->orderBy('sort','desc')->get();
        $products = DB::table('liqueur_products')->orderBy('sort','desc')->get();
        $methods = DB::table('liqueur_methods')->orderBy('sort','desc')->get();
        $sures = DB::table('liqueur_sures')->orderBy('sort','desc')->get();
        $banners = DB::table('liqueur_imgs')->orderBy('sort','desc')->get();


        // dd($attitudes);

        return view('Yamasaki', compact('stories','attitudes','products','methods','sures','banners'));
    }
}
