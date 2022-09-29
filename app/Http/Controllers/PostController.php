<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // 1 Retreive all post from models Post
        // $posts= Post::all();
        // $posts = Post::where('is_published', 1)->orderBy('updated_at', 'desc')->limit(3)->get();
        // $posts = Post::orderBy('updated_at', 'desc')->get();
        
        // paginate:
        $posts = Post::orderBy('updated_at', 'desc')->paginate(4);
        // $posts = Post::orderBy('updated_at', 'desc')->simplePaginate(8);
      //2 send data to view
      return view("pages.home", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        // dd($request);
        
        // dd($request->all());
        $request->validate([
            'title' => 'required|min:5|string|max:180|unique:posts,title',
            'content' => 'required|min:20|max:350|string'
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'url_img' => $request->url_img,
            'created_at'=> now()
        ]);
        return redirect()
        ->route('home')
        ->with('status', 'Le post a bien été rajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // dd($post);
        return view('pages.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // dd($post);
        return view('pages.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $published = 0;
        if($request->has('is_published')){
            $published=1;
        }
        
        $request->validate([
            'title' => 'required|min:5|string|max:180',
            'content' => 'required|min:20|max:350|string'
        ]);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'url_img' => $request->url_img,
            'is_published' => $published,
            'updated_at'=> now()
        ]);

       
        return redirect()
        ->route('home')
        ->with('status', 'Le post a bien été modifié!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()
            ->route('home')
            ->with('status', "L'article a bien été supprimé");
    }
}
