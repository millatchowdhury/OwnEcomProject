<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\File;
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

    public function editCategory($id){
        $category = Category::find($id);
        $mainCategories = Category::orderBy('id', 'desc')->where('parent_id', NULL)->get();
        if(!is_null($category)){
            return view('backend.pages.category.edit', compact('category', 'mainCategories'));
        }else{
            return redirect()->route('manage.category');
        }
    }

    public function updateCategory(Request $request, $id){
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id_Select_CustomId;
        // old image delete 
        if(File::exists("storage/images/".$category->image)){
            File::delete("storage/images/".$category->image);

            $img = $request->file('categoryImage');
            $imageName = time().uniqid().'.'.$img->getClientOriginalExtension();
            $request->file('categoryImage')->storeAs('images', $imageName, 'public');
            $category->image = $imageName;
        }
        $category->save();
        return redirect()->route('manage.category');
        
    }

    public function deleteCategory($id){
        $category = Category::find($id);
        if(!is_null($category)){
            // Delete sub category 
           $subCategory = Category::orderBy('name', 'desc')->where('parent_id', $category->id)->get();
           foreach($subCategory as $sub){
            if(File::exists('storage/images/'.$sub->image)){
                File::delete('storage/images/'.$sub->image);
            }
            $sub->delete();
           }
           
        }
        if(File::exists('storage/images/'.$category->image)){
            File::delete('storage/images/'.$category->image);
        }
        $category->delete();
        return redirect()->route('manage.category');
    }

}
