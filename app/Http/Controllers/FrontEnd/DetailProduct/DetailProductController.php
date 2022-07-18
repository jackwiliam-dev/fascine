<?php

namespace App\Http\Controllers\FrontEnd\DetailProduct;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailProductController extends Controller
{
    public function detailProduct($slug, $id){

        $product = DB::table('products')->where('slug' , '=', $slug)->where('id' , '=', $id)->first();
        $product_image = DB::table('product_images')->where('productId' , '=', $id)->get();
        $product_rating = DB::table('product_reviews')->where('productId', '=', $id)->get();
        $count_rating = $product_rating->count();
        $categories = Category::where('parentId', 0)->get();

        return view('FrontEnd.product.detail', compact('product', 'product_image', 'count_rating', 'categories'));
    }
}
