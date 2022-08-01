<?php

namespace App\Http\Controllers;

use App\models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function products()
    {
        $products=Product::all();
        dd($products);
    }
    public function product($id)
    {
        $product = Product::find($id);
        return view('product', compact([
            'product',
        ]));
    }
}
