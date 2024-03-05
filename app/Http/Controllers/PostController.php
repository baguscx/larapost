<?php

namespace App\Http\Controllers;

use App\Mail\BlogPosted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


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

        //Kalo user tdk login, ngapain?
        if(!Auth::check()){
            return redirect('login');
        }
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
        //Kalo user tdk login, ngapain?
        if(!Auth::check()){
            return redirect('login');
        }
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Kalo user tdk login, ngapain?
        if(!Auth::check()){
            return redirect('login');
        }
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
        $post = Post::create([
            'title' => $title,
            'content' => $content,
        ]);
        \Mail::to(Auth::user()->email)->send(new BlogPosted($post));

        $this->notify_telegram($post);

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Kalo user tdk login, ngapain?
        if(!Auth::check()){
            return redirect('login');
        }
        //query builder
        // $post = DB::table('posts')->where('id', $id)->first();
        // eloquent
        $post = Post::where('slug', $id)->first();
        
        $comments = $post->comments()->get(); 
        $total_comments = $post->comments()->count();

        return view('posts.show', ['post' => $post, 'comments' => $comments, 'total_comments' => $total_comments]);
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //Kalo user tdk login, ngapain?
        if(!Auth::check()){
            return redirect('login');
        }
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
        //Kalo user tdk login, ngapain?
        if(!Auth::check()){
            return redirect('login');
        }
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
        //Kalo user tdk login, ngapain?
        if(!Auth::check()){
            return redirect('login');
        }
        // Query Builder
        // DB::table('posts')->where('id', $id)->delete();
        // Eloquent
        Post::where('id', $id)->delete();
        return redirect('posts');
    }

    private function notify_telegram($post){
        $token = "7077729285:AAERrOJxs-PmDG2MdiSRnHdyyNfL1yUHVPk";
        $url = "https://api.telegram.org/bot{$token}/sendMessage";
        $chat_id = "-4175275832";
        $content = "New Post: ".$post->title;

        $data = [
            "chat_id" => $chat_id,
            "text" => $content,
            "parse_mode" => "HTML"
        ];
        
        Http::post($url, $data);
    }
}
