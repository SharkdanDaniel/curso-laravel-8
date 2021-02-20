<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::orderBy('id', 'ASC')->paginate(2);
        $posts = Post::latest()->paginate(2);

        return view('admin.posts.index', compact('posts'));
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

    public function create()
    {
        // return view('admin.posts.create');
        return view('admin.posts._partials.form');
    }

    public function store(StoreUpdatePost $request)
    {
        // $request->file('image') esta é outra maneira de buscar a imagem

        $data = $request->all();

        if ($request->image->isValid()) {
            $nameFile = Str::of($request->title)->slug('-') . '.' . $request->image->getClientOriginalExtension();
            $image = $request->image->storeAs('posts', $nameFile);
            $data['image'] = $image;
        }

        Post::create($data);

        return redirect()->route('posts.index')
            ->with('timer', 2000)
            ->with('message', 'Post adicionado com sucesso!');
        // ->with('error', 'danger')
    }

    public function edit($id)
    {
        if (!$post = Post::find($id)) {
            return redirect()->back();
        }

        // return view('admin.posts.edit', compact('post'));
        return view('admin.posts._partials.form', compact('post'));
    }

    public function update(StoreUpdatePost $request, $id = null)
    {

        if (!$post = Post::find($id)) {
            return redirect()->back();
        }

        $data = $request->all();

        if ($request->image && $request->image->isValid()) {
            if (Storage::exists($post->image)) {
                Storage::delete($post->image);
            }

            $nameFile = Str::of($request->title)->slug('-') . '.' . $request->image->getClientOriginalExtension();
            $image = $request->image->storeAs('posts', $nameFile);
            $data['image'] = $image;
        }

        $post->update($data);

        return redirect()->route('posts.index')
            ->with('message', 'Post atualizado com sucesso!');
    }

    public function destroy($id)
    {
        if (!$post = Post::find($id)) {
            return redirect()->route('posts.index');
        }

        if (Storage::exists($post->image)) {
            Storage::delete($post->image);
        }
        $post->delete();

        return redirect()->route('posts.index')
            ->with('message', 'Post deletado com sucesso!');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $posts = Post::where('title', '=', "{$request->search}")
            ->orWhere('content', 'LIKE', "%{$request->search}%")
            ->paginate(1);
        return view('admin.posts.index', compact('posts', 'filters'));
    }
}
