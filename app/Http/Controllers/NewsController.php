<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $new = News::all();
        return view('news.index', compact('new'));}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $new=new News();
        return view('news.create',compact('new'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
        News::create($validatedData);
        return redirect()->route('news.index')->with('success','');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news,$id)
    {
        $new=$news::findOrFail($id);
        return view('news.show',compact('new'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news,$id)
    {
        $new=News::findOrFail($id);
        return view('news.edit',compact('new'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
        $news->update($validatedData);
        return redirect()->route('news.index')->with('success','News updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        News::findOrFail($news->id)->delete();
        return redirect()->route('news.index')->with('success','News deleted successfully');
    }
}
