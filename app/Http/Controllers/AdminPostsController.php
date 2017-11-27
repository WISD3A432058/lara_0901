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

    public function store(PostRequest $request)
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
        $post=Post::find($id);
        $data=['post'=>$post];
        return view('admin.posts.edit',$data);
    }

    public function update(PostRequest $request,$id)
    {
        $post=Post::find($id);
        $post->update($request->all());
        return redirect()->route('admin.posts.index');
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('admin.posts.index');
    }

}
