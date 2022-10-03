<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        // dd($id);
        // dd($request->all());
        $request->validate([
            'content'=>'required|max:160|min:2|string',
        ]);
        
        // get data of form
        $data = [
            'content' => $request->content,
            'created_at' => now(),
            'post_id' => $id
        ];
        // insert in table Comment
        Comment::create($data);

        return back()->with('status', 'Commentaire ajouté');
    }
}
