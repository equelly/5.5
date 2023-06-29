<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;

class CountController extends Controller
{
    //
    public function __invoke()
    {
        $posts = Post::all();
        $products = Product::all();
       return view('count', compact('posts', 'products'));
    }
}
