<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Query Builder
        // $posts = DB::table('posts')->where('active', true)->orderBy('created_at', 'desc')->get();
        // // $view_data = [
        // //     'posts' => $posts
        // // ];

        // Eloquent
        $posts = Post::active()->descending()->get();
        // // $view_data = [
        // //     'posts' => $posts
        // // ];

        return view('posts.index', ['posts' => $posts]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');

        //Query Builder
        // DB::table('posts')->insert([
        //     'title' => $title,
        //     'content' => $content,
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s')
        // ]);

        //Eloquent
        Post::create([
            'title' => $title,
            'content' => $content,
        ]);

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //query builder
        // $post = DB::table('posts')->where('id', $id)->first();
        // eloquent
        $post = Post::where('id', $id)->first();
        
        $comments = $post->comments()->get(); 
        $total_comments = $post->comments()->count();

        return view('posts.show', ['post' => $post, 'comments' => $comments, 'total_comments' => $total_comments]);
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //query builder
        // $post = DB::table('posts')->select('id', 'title', 'content', 'created_at', 'updated_at')->where('id', $id)->first();
        //eloquent
        $post = Post::select('id', 'title', 'content', 'created_at', 'updated_at')->where('id', $id)->first();
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $title = $request->input('title');
        $content = $request->input('content');

        // Query Builder
        // DB::table('posts')->where('id', $id)->update([
        //     'title' => $title,
        //     'content' => $content,
        //     'updated_at' => date('Y-m-d H:i:s')
        // ]);

        // Eloquent
        Post::where('id', $id)->update([
            'title' => $title,
            'content' => $content,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Query Builder
        // DB::table('posts')->where('id', $id)->delete();
        // Eloquent
        Post::where('id', $id)->delete();
        return redirect('posts');
    }
}
