<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use App\Models\Comment;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $postingan = Upload::all();
        return view('welcome', compact('postingan'));
    }

     public function welcomePost(Request $request)
     {
        $upload = Upload::all();
        foreach ($upload as $value) {
            $upload = Upload::find($value->id);
            $upload->comments()->create($request->all());
            $upload->save();
        }

        return redirect()->back();
     }
}
