<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ArticleCategory;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryController extends Controller
{
    //
    public function create(Request $req){
        $category = Category::create($req->all());
        return response($category, 201);
    }
    
    public function delete(Request $req, Category $category){
        try{
            ArticleCategory::where('category_id', '=', $category->id)->firstOrFail();
        } 
        catch (ModelNotFoundException $e)
        {
            if ($e instanceof ModelNotFoundException){
                $category->delete();
            }            
        }
        return response()->json(['error' => '1', 'message' => 'This category is used.'], 200);
    }      
}
