<?php

namespace App\Http\Controllers;

use App\models\Category;
use App\models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        $latestProducts = Product::orderBy('id', 'desc')->limit(6)->get();
        $sliderProducts = Product::where('is_recommended', 1 )->get();
        return view('home', compact([
            'categories',
            'latestProducts',
            'sliderProducts' ,
        ]));
    }

    public function test()
    {

    }
}
