<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
// use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = request();
        $query = News::query();
        $title = $request->query('title');

        if ($title) {
            $query->where('title', 'like', "%{$title}%");
        }
        if ($request->category_id){
            $query->where('category_id', $request->category_id);
        }
            return view('news.index', [
                'news' => $query->latest()->paginate(4),
                'categories' => Category::all(),
            ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $new = new News();
        $categories = Category::all();
        $news = News::all();
        return view('news.create', compact('new', 'news', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'type' => 'max:100',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'video_url' => 'nullable|url',

        ]);

        $validatedData['slug'] = Str::slug($validatedData['title']);
        $validatedData['user_id'] = Auth::id();

        News::create($validatedData);

        return redirect()->route('news.index')->with('success', 'News added successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        $comments = $news->comments()->with('user')->get();
        $new = $news::findOrFail($news->id);
        return view('news.show', compact('new', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $categories_id = Category::all();
        $new = News::findOrFail($news->id);
        return view('news.edit', compact('new', 'categories_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'type' => 'max:100',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'video_url' => 'nullable|url',

        ]);
        $news->update($validatedData);
        return redirect()->route('news.index')->with('success', 'News updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        News::findOrFail($news->id)->delete();
        return redirect()->route('news.index')->with('success', 'News deleted successfully');
    }
}
