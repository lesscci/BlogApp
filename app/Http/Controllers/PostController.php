<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        //Carga la vista de los posts con todos los posts como variable.
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = Auth::user();
        $post = new Post;
        $post->title = $request->title;
        $post->cont = $request->cont;
        $post->user_id = $user->id;
        $post->tag_id = $request->tag_id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = Storage::putFile('public/images', $request->file('image'));
            $nuevo_path = str_replace('public/', '', $path);
            $post->image_url = $nuevo_path;
        }
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function view($post)
    {
        $post = Post::find($post);
        return view('view', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post ->title = $request->input('title');
        $post ->cont = $request->input('cont');

        $post->save();

        $posts =Post::all();
        return redirect()->route('posts.index', $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($post_id)
    {
        $post = Post::find($post_id);
        if ($post->image_url) {
            Storage::delete('public/' . $post->image_url);
        }
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function rate(Request $request, $id)
{
    $post = Post::findOrFail($id);
    $rating = $request->input('rating');
    // Aquí es donde guardarías la valoración en la base de datos
    $post->rating = $rating;
    $post->save();
    // Redirige de vuelta a la página de la publicación para mostrar la valoración actualizada
    return redirect()->route('posts.view', $post->id);
}

    public function search(Request $request)
    {
        $query = $request->input('q');

        $posts = Post::where('title', 'LIKE', '%' . $query . '%')
                     ->orWhere('content', 'LIKE', '%' . $query . '%')
                     ->get();

        return response()->json(['results' => $posts]);

}

}

