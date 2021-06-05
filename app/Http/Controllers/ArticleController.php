<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    //
    public function articles(){
        return response()->json(Article::get(), 200);
    }

    public function articlesById($id){
        return response()->json(Article::find($id), 200);
    }

    public function articlesByName($name){
        return response()->json(Article::where("name", "like", "%$name%")->get(), 200);
    }

    public function articlesByPrice($price_from, $price_before){
        return response()->json(Article::whereRaw("price between $price_from and $price_before")->get(), 200);
    }    
    
    public function articlesPublished(){
        return response()->json(Article::where("published", "=", 1)->get(), 200);
    }  
    
    public function articlesActual(){
        return response()->json(Article::where("deleted", "=", 0)->get(), 200);
    }      

    public function create(Request $req){
        $article = Article::create($req->all());
        return response($article, 201);
    }

    public function edit(Request $req, Article $article){
        $article->update($req->all());
        return response($article, 200);
    }
    
    public function delete(Request $req, Article $article){
        $article->deleted = 1;
        $article->save();
        return response($article, 200);
    }      
}


