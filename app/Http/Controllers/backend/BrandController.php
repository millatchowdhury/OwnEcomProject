<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    public function manageBrand(){
        $brands = Brand::all();
        return view('backend.pages.brand.manage', compact('brands'));
    }

    public function createBrand(){
       return view('backend.pages.brand.create');
    }

    public function storeBrand(Request $request){
        $brand =  new Brand();
        $brand->name = $request->name;
        $brand->description = $request->description;
        if($request->hasFile('brandImage')){
            $image = $request->file('brandImage');
            $imageName = time().uniqid().'.'.$image->getClientOriginalExtension();
            $image->storeAs('images', $imageName, 'public');
            $brand->image = $imageName;
            $brand->save();
        }
        return redirect()->route('manage.brand');
    }

    public function editBrand(Request $request, $id){
        $brand = Brand::find($id);
        return view('backend.pages.brand.edit', compact('brand'));
    }

    public function updateBrand(Request $request, $id){
        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->description = $request->description;
        if(File::exists('storage/images/'.$brand->image)){
            File::delete('storage/images/'.$brand->image);
            $brand->image = null;
        }
        if($request->hasFile('brandImageNew')){
            $image = $request->file('brandImageNew');
            $imageName = time().uniqid().'.'.$image->getClientOriginalExtension();
            $image->storeAs('images', $imageName, 'public');
            $brand->image = $imageName;
            $brand->save();
        }
        return redirect()->route('manage.brand');

    }

    public function deleteBrand($id){
        $brand = Brand::find($id);
        if(!is_null($brand)){
            if(File::exists('storage/images/'.$brand->image)){
                File::delete('storage/images/'.$brand->image);
            }
        }
        $brand->delete();
        return redirect()->route('manage.brand');
    }
}
