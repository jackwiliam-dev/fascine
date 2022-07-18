<?php

namespace App\Http\Controllers\FrontEnd\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->where('deleted', 0)->get();
        $categories = Category::where('parentId', 0)->where('deleted', 0)->get();
//        dump($categories);
        $products = Product::latest()->take(6)->get();
        $productsRecommend = Product::latest('views_count', 'desc')->take(12)->get();
        $categoriesLimit = Category::where('parentId', 0)->take(3)->get();

        return view('FrontEnd.home.home', compact('sliders', 'categories', 'products', 'productsRecommend', 'categoriesLimit'));
    }
}
