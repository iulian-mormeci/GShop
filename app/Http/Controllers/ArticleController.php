<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //function for the index of the articles
    public function index()
    {
        //variable with all the articles for now
        $articles = Article::get();

        //return of the view with the compact of the  articles requested
        return view('articles.index', compact('articles'));
    }

    //function for the detail of the article
    public function show(Article $article)
    {
        //return of the view for the detail of the article and compact of it
        return view('articles.show', compact('article'));
    }
}
