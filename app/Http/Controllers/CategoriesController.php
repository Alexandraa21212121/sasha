<?php

namespace App\Http\Controllers;

use App\models\Category;
use App\models\Product;
use Illuminate\Http\Request;
use League\CommonMark\Extension\Mention\Generator\StringTemplateLinkGenerator;

class CategoriesController extends Controller
{
    public function categories()
    {
        $categories=Category::find(5);
        dd($categories->name);
    }

    public function category($id)
    {
        $category = Category::find($id);
        $products = Product::where('category_id', $id)->paginate(6);
        $categories = Category::all();
        return view('category', compact([
            'category',
            'products',
            'categories' ,
        ]));
    }
}
