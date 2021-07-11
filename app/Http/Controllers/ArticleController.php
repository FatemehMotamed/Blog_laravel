<?php

namespace App\Http\Controllers;


use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    function index(){
//        $articles = Article::latest()->take(10)->get();
        $articles = Article::latest()->paginate(3);
        return view('articles.index', compact('articles'));
    }
    function create(){
        return view('articles.create');
    }


//    VALIDATION WITHOUT CLASS
//    function store(){
//        // All DATA recieved from form
//        // return request()->all();
//        // return request('title');
//
////        $this ->validate(request(), [
////            'title' => 'required',
////            'body' => 'required'
////        ]);
//
////      ×××××××× error message define here
////        $this ->validate(request(), [
////            'title' => 'required',
////            'body' => 'required'
////        ],
////        ['title.required' => 'عنوان حتما باید وارد شود']);
//
//        $validator = Validator::make(request()->all(),[
//            'title' => 'required',
//            'body' => 'required'
//        ]);
//        if ($validator->fails()){
//            return redirect()->back()->withErrors($validator)->withInput();
//        }
//
//        Article::create([
//            'user_id'=>1,
//            'title' => request('title'),
//            'slug' => request('title'),
//            'body' => request('body'),
//        ]);
//
//        return redirect('/');
//
//    }

// VALIDATIN WITH CLASS ------> php artisan make:request ArticleRequest
    function store(ArticleRequest $request){

        Article::create([
            'user_id'=>1,
            'title' => request('title'),
            'slug' => request('title'),
            'body' => request('body'),
        ]);

        return redirect('/');

    }

    function show(Article $article){
        return view('articles.show', compact('article'));

    }
}
