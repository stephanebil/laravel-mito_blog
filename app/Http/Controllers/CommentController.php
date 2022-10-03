<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'content'=>'required',
        ]);
        
        // get data of form
        $data = [
            'content' => $request->content,
            'created_at' => now()
        ];
        // insert in table Comment
        Comment::create($data);
    }
}
