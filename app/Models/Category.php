<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'image', 'parent_id'];
    public function parent(){
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function product(){
        return $this->hasMany(Product::class);
    }
    public static function parentOrNotCategory($parentId, $childId){
       $categories =  Category::where('id', $childId)->where('parent_id', $parentId)->get();
       if(!is_null($categories)){
       return true;
       }else{
       return false;
       }
    }
}
