<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendProductController extends Controller
{
    public function createProduct(){
        return view('backend.pages.product.create');
    }
}
