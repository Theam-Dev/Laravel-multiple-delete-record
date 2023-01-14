<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function welcome(){
        $data = Post::all();
        return view("welcome",compact("data"));
    }
    public function delete(Request $request){
        Post::whereIn('id', $request->get('selected'))->delete();

        return response("Selected post(s) deleted successfully.", 200);
    }
}
