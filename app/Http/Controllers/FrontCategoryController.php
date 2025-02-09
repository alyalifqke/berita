<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        // $category = Category::where('slug', $slug)->firstOrFail();
        // $news = $category->news()->latest()->paginate(5);
        // return view('category.show', compact('category', 'news'));
        $categories = Category::all();
        $category = Category::where('slug', $slug)->firstOrFail();
        // $news = $category->news()->latest()->paginate(5);
        // $news = News::withCount('comments')->latest()->paginate(10);
        
      
        $news = News::where('category_id', $category->id)->withCount('comments')->latest()->paginate(3)->withQueryString();
        $latestNews = News::with('category')->latest()->take(5)->get();
        $newsix = News::with('category')->latest()->take(6)->get();
        // $news = News::where('slug', $slug)->firstOrFail();
        // $news->increment('views');
        $comments = News::withCount('comments')->get();
        $popularNews = News::orderBy('views', 'desc')->take(5)->get();
        // return view('frontend.category', compact('category', 'news'));
        
        return view('category.show', compact(
            'categories',
            'news',
            'newsix', 
            'category', 
            // 'newscat', 
            'latestNews', 
            'comments', 
            'popularNews',
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}

