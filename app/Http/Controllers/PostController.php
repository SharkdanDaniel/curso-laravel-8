<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePost;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::get();

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(StoreUpdatePost $request)
    {

        Post::create($request->all());

        return redirect()->route('posts.index')
        ->with('timer', 2000)
        ->with('message', 'Post adicionado com sucesso!');
        // ->with('error', 'danger')
    }

    public function show($id)
    {
        // $post = Post::where('id', $id)->first();
        $post = Post::find($id);

        if (!$post) {
            return redirect()->route('posts.index');
        }

        return view('admin.posts.show', compact('post'));
    }

    public function destroy($id)
    {
        if (!$post = Post::find($id)) {
            return redirect()->route('posts.index');
        }
        $post->delete();
        
        return redirect()->route('posts.index')
        ->with('message', 'Post deletado com sucesso!');
    }
}
