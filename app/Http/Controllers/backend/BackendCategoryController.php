<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class BackendCategoryController extends Controller
{
    public function manageCategory(){
        $allCategories = Category::orderBy('id', 'desc')->get();
        return view('backend.pages.category.manage', compact('allCategories'));
    }

    public function createCategory(){
        $mainCategories = Category::orderBy('name', 'desc')->where('parent_id', Null)->get();
        return view('backend.pages.category.create', compact('mainCategories'));
    }

    public function storeCategory(Request $request){
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id_Select_CustomId;
        if($request->hasFile('categoryImage')){
            $image = $request->file('categoryImage');
            $imageName = time().".".$image->getClientOriginalExtension();
            $request->file('categoryImage')->storeAs('images', $imageName, 'public');
            $category->image = $imageName;
            $category->save();
        }

        // Category::create([
        //     'name' => $request->name,
        //     'parent_id' => $request->parent_id_Select_CustomId,
        //     'description' => $request->description
        // ]);
        return redirect()->route('manage.category');
    }

}
