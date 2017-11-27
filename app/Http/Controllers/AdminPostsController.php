<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class AdminPostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at','DESC')->get();
        $data = ['posts'=>$posts];
        return view('admin.posts.index', $data);
    }

    public function store(Request $request)
    {
        //將表單送過來的資料用 Model 寫入資料庫
        Post::create($request->all());
        //設定頁面跳轉
        return redirect()->route('admin.posts.index');
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function edit($id)
    {
        $data = ['id' => $id];

        return view('admin.posts.edit', $data);
    }
}
