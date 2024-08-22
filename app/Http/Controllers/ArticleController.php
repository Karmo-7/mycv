<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticlesRequest;
use App\Http\Requests\UpArticlesRequest;
use App\Models\Article;

use Illuminate\Http\Request;


class ArticleController extends Controller
{
    public function addarticle (ArticlesRequest $request,Article $article){
        $validate=$request->validated();
        if($validate){
             $newarticle = $article->create($validate);
            return response()->json(['article' => $newarticle],200);
        }
        return response()->json(['error' => $validate->errors()],400);
    }

    public function updatearticle(UpArticlesRequest $request, Article $article, $id)
    {
    $article = Article::with('Sport')->find($id);
    if (!$article) {
        return response()->json(['error' => 'Article not found'], 404);
    }
    $validatedData = $request->validated();
    if ($validatedData) {
        $article->update($validatedData);
        return response()->json(['article' => $article], 200);
    }
    return response()->json(['error' => $validatedData->errors()], 400);
    }
    public function showarticle($id){

        $article = Article::with('Sport')->find($id);

        if (!$article) return response()->json(['error' => 'article not found'],404);
        else{
            return response()->json(['article' => $article],200);
        }
    }

    public function Allarticle(){
        $article=Article::with('Sport')->get();
        return response()->json(['Articles' => $article],200);
    }

    public function deleltearticle($id){
        $article=Article::find($id);
        if (!$article) return response()->json(['error' => 'article not found '],404);
        else{
            $article->delete();
            return response()->json(['message' => 'article removed successfully'],200);
        }
    }


}
