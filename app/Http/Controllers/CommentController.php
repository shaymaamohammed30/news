<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\User;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', ['comments' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $comment = new Comment();
        $news = News::all();
        $users = User::all();
      return back()->compact('comment', 'news', 'users');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'body'=>'required|string',
            'user_id'=>'required|exists:users,id',
            'news_id'=>'required|exists:news,id',
        ]);
        Comment::create($validatedData);
      return back()->with('success', 'Comment added successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return back()->compact('comment');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
      
        return back()->compact('comment');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $validatedData = $request->validate([
            'body' => 'required|string',
        ]);

        $comment->update($validatedData);

        return back()->with('success', 'Comment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
 return back()->with('success', 'Comment deleted successfully');
    }
}
