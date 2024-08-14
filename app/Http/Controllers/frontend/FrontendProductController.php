<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendProductController extends Controller
{
    public function index(){
        // $products = Product::with('images')->get();
        $products = Product::orderBy('id', 'desc')->get();
        
        return view('frontend.pages.products.index', compact('products'));
    }
}
