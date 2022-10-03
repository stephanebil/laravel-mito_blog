<?php

namespace App\Http\Controllers;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index()
    {
        // $arrs = ["Toto","Toti"];
        // $arrGames = ['Fifa', 'Peppa Pig'];

        // return view('pages.home', ["arrs" => $arrs, "games" => $arrGames]);
        // return view('pages.home', compact("arrs", "arrGames"));
        
        // R de CRUD Read
        // $posts = Test::all();
        // $posts = DB::table('tests')->orderBy('name', 'desc')->get();
        // $posts = Test::orderBy('name', 'desc')->get();
        $posts = Test::get();
        // $posts = Test::where('id', '2')->get();
        // dd($posts);
        // return view('pages.home', compact('posts'));
    }
    
    public function about()
    {
        return view('pages.about');
    }

}
