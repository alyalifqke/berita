<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontNewsController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $news = News::latest()->take(1)->get();
        $categories = Category::all();
        $latestCategories = Category::with(['latestNews'])->take(4)->get();
        $featuredNews = News::with('category')->latest()->take(8)->get();
        $latestNews = News::with('category')->latest()->take(5)->get();
        $newsix = News::with('category')->latest()->take(6)->get();
        $newsByDate = News::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date', 'desc')
            ->get();
        $popularNews = News::orderBy('views', 'desc')->take(3)->get();
        $comentNews = News::withCount('comments')
        ->orderBy('comments_count', 'desc')
        ->take(4)
        ->get();

        $latestNewsByCategory = News::whereIn('slug', function ($query) {
            $query->select(DB::raw('slug'))
                  ->from('news')
                  ->whereRaw('created_at = (SELECT MAX(created_at) FROM news n2 WHERE n2.category_id = news.category_id)');
        })
        ->with('category')
        ->get();

        // $spesialCat = News::where('category_id', $category->id)
        //         ->latest()
        //         ->take(4)
        //         ->get();

        return view('news.index', compact(
            'news',
            'newsix',
            'categories', 
            'latestNews', 
            'featuredNews',
            'newsByDate',
            'latestCategories',
            'popularNews',
            'comentNews',
            'latestNewsByCategory',
            // 'spesialCat',
        ));





        
        return view('news.index', compact('news'));
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
        if (in_array($slug, ['login', 'register', 'password/reset', 'admin'])) {
            abort(404);
        }

        $categories = Category::all();
        $latestNews = News::with('category')->latest()->take(5)->get();
        $newsix = News::with('category')->latest()->take(6)->get();
        $news = News::where('slug', $slug)
        ->with(['comments.replies'])
        ->firstOrFail();
        
        $news->increment('views');
        $comments = News::withCount('comments')->get();
        $popularNews = News::orderBy('views', 'desc')->take(5)->get();

        return view('news.show', compact(
            'news',
            'newsix',
            'categories',
            'latestNews',
            'popularNews',
            'comments'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        //
    }
}
