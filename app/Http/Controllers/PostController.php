<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Images;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    // attention avant construct mettre 2 _ _  !!!!
    public function __construct()
    {
        // toutes les routes doivent être authentifiées sauf index et show
        $this->middleware(['auth'])->except(['index', 'show',]);
    }
    
    
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
        // dd($request->file('url_img'));
        $request->validate([
            'title' => 'required|min:5|string|max:180|unique:posts,title',
            'content' => 'required|min:20|max:2000|string',
            'url_img' => 'required|image|mimes:png,jpg,jpeg|max:2000'
            // 'slug' => 'required|image|mimes:png,jpg,jpeg|max:2000'
        ]);

        // $validateImg = $request->file('url_img')->store('posts');
        $validateImg = $request->file('url_img')->store('posts');

        $new_post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            // 'url_img' => $request->url_img,
            'url_img' => $validateImg,
            'created_at'=> now()
        ]);

        //1- Verifi if User select image or not
        if($request->has('images')){
            // 2- stock all images selected in array
            $imagesSelected = $request->file('images');
            // 3- loop storage each image
            foreach ($imagesSelected as $image) {
                // 4- give a new name for each image
                $image_name= md5(rand(1000, 10000)). '.' . strtolower($image->extension());
                //  definit le chemin de sauvegarde de l'image (set the pathname)
                $path_upload = 'images/';
                $image->move(public_path($path_upload), $image_name);

                Images::create([
                    "slug" => $path_upload . '/' . $image_name, //posts/images/shsjsjhskjshkjshsjsk.png
                    "created_at" => now(),
                    "post_id" => $new_post->id
                ]);

            }
        }
    

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

        // verify if file exist
        // if file exist delete previous img
        if($request->hasFile('url_img')){
            // delete previous image
            Storage::delete($post->url_img);
            //store the new image
            $post->url_img = $request->file('url_img')->store('posts');
        }

        //1- Verifi if User select image or not
        if($request->has('images')){
            // 2- stock all images selected in array
            $imagesSelected = $request->file('images');
            // 3- loop storage each image
            foreach ($imagesSelected as $image) {
                // 4- give a new name for each image
                $image_name= md5(rand(1000, 10000)). '.' . strtolower($image->extension());
                //  definit le chemin de sauvegarde de l'image (set the pathname)
                $path_upload = 'images/';
                $image->move(public_path($path_upload), $image_name);

                Images::create([
                    "slug" => $path_upload . '/' . $image_name, //posts/images/shsjsjhskjshkjshsjsk.png
                    "created_at" => now(),
                    "post_id" => $post->id
                ]);

            }
        }
        
        $request->validate([
            'title' => 'required|min:5|string|max:180',
            'content' => 'required|min:20|max:3050|string',
            'url_img' => 'required|sometimes|image|mimes:png,jpg,jpeg|max:2000'
        ]);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            // 'url_img' => $request->url_img,
            'url_img' => $post->url_img,
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
    // méthode de all-posts.blade.php
    public function allPosts()
    {
        $posts = Post::orderBy('updated_at', 'DESC')->paginate(5);
        return view('pages.all-posts', compact('posts'));
    }
    
    public function removeImage($id)
    {
        // 1- find the good image with the good id
        $image = Images::find($id);
        // 2- verify image exist
        if(!$image){
            abort(404);
        }

        // 3- delete image in actually folder
        unlink(public_path($image->slug)); // public/images/img/dskjshdkjsdhdjsjd.jpg
        // 4- delete image from DB (BDD)
        $image->delete();

        // 5- redirect to the post
        return back()->with('status', "l'image a ben été supprimé");

    }
    
}
