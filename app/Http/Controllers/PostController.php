<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PostController extends Controller
{
    //

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index($id)
    {
        $userOb = new User();
        $user = $userOb->findOrFail($id);

        $data = $user->with('posts.comments')->get();

        // dd($data);

        return view('postviewer',[
            'data' => $data
        ]);
    }
}
