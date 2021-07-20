<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Article $article){
//
       $article->comment()->create([
           'name'=> request('name'),
           'body'=> request('body'),
        ]);
        return back();
    }
}
