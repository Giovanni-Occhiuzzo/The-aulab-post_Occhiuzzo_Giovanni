<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\Middleware;


class ArticleController extends Controller 
{
    public function __construct()
    {
        $this->middleware('auth')->except('index' , 'show');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->get();
        return view('aticle.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required｜unique:articles｜min:5',
            'subtisle' => 'required｜min:5',
            'body' => 'required｜min:10',
            'image' => 'required｜image',
            'category' => 'required',
        ]);

        $article = Article::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'image' => $request->file('image')->store('public/images'),
            'category_id' => $request->category,
            'user_id' => Auth::user()->id,
        ]);
        return redirect(route('hompage'))->with('message', 'Articolo creato con successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }

    public function byCategory(Category $category){
        $articles = $category->articles()->orderBy('created_at', 'desc')->get();
        return view('article.by-category', compact('category', 'articles'));
    }

    public function byRedattore(User $redattore)
    {
        $articles = $redattore->articles()->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.byRedattore', compact('redattore', 'articles'));
    }
}