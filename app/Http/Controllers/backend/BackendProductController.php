<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use function PHPUnit\Framework\isNull;

class BackendProductController extends Controller
{
    public function createProduct(){
        return view('backend.pages.product.create');
    }
    public function storeProduct(Request $request){

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'price' => 'required'
        ]);
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->slug = Str::slug($request->title, '-');
        $product->offer_price = 0;
        $product->admin_id = 1;
        $product->save();

       
        //single image
        // if($request->hasFile('product_image')){  //single image
        //     $image = $request->file('product_image');
        //     $imageName = time().'.'.$image->getClientOriginalExtension();
        //     $request->file('product_image')->storeAs('images', $imageName, 'public');

        //     $product_image = new ProductImage();
        //     $product_image->product_id = $product->id;
        //     $product_image->image = $imageName;
        //     $product_image->save();

        // }


        //multi image
        if($request->hasFile('product_image')){  //multi image
            foreach($request->file('product_image') as $image){
                $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
                $image->storeAs('images', $imageName, 'public');
                $product_image = new ProductImage();
                $product_image->product_id = $product->id;
                $product_image->image = $imageName;
                $product_image->save();

            }
        }

      
        return redirect()->route('manage.product');
    }

    public function manageProduct(){
        $products = Product::orderBy('id', 'desc')->get();
        return view('backend.pages.product.manage', compact('products'));
    }

    public function editProduct($id){
        $product = Product::find($id);
        return view('backend.pages.product.edit', compact('product'));
    }

    public function updateProduct(Request $request, $id){
        $product = Product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->save();
        return redirect()->route('manage.product');
    }

    public function deleteProduct(Request $request, $id){
        $product = Product::find($id);
        // if(!isNull($product)){
        //     $product->delete();
        // }
        $product->delete();
        $request->session()->flash('success', 'product has deleted successfully');
        return back();
    }



}

  // if($request->hasFile('product_image')){
        //     foreach($request->file('product_image') as $image){
        //         $imageName = time()."-".uniqid().".".$image->getClientOriginalExtension();
        //         // $image->move('images', $imageName);
        //         $image->storeAs('images', $imageName, 'public');
        //         ProductImage::create([
        //             'product_id'=>$product->id,
        //             'image' => $imageName,
        //         ]);
        //     }
        // }