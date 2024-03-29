<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = article::with('user')->get();

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.form', [
            'article' => new article(),
            'page_meta' => [
                'title' => 'Create Article',
                'method' => 'POST',
                'action' => route('articles.store'),
                'submit_button' => 'Create'
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $request->user()->articles()->create($request->validated());

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(article $article)
    {
        return view('articles.form', [
            'article' => $article,
            'page_meta' => [
                'title' => 'Edit Article: ' . $article->title,
                'method' => 'PUT',
                'action' => route('articles.update', $article),
                'submit_button' => 'Update'
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, article $article)
    {
        $article->update($request->validated());

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(article $article)
    {
        $article->delete();

        return redirect()->route('articles.index');
    }
}
