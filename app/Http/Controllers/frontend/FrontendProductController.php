<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class FrontendProductController extends Controller
{
    public function index(){
        // $products = Product::with('images')->get();
        $products = Product::orderBy('id', 'desc')->get();
         
        return view('frontend.pages.products.index', compact('products'));
    }

    public function productDetails($slug){
        $product = Product::where('slug', $slug)->first();
        return view('frontend.pages.products.product_details', compact('product'));
    }

    public function categoryWiseProduct($id, Request $request){
        $category = Category::find($id);
        $products = $category->product()->get();
        // $productImage = ProductImage::where('product_id', $product->id)->get();
        $proImage = Product::with('images')->get();
        // return $proImage;
        
        return view('frontend.pages.products.categoryWiseProduct', compact('products', 'proImage'));
    }
}
