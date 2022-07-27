<?php

namespace App\Http\Controllers;

use App\models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function categories()
    {
        $categories=Category::find(5);
        dd($categories->name);
    }
}
