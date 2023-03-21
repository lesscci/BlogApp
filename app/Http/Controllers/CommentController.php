<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->guest()) {
            return back()->with('error', 'Debes iniciar sesión para comentar.');
        }
        $comment = new Comment();
        $comment->post_id = $request->post_id;
        $comment->comment = $request->comment;
        $comment->user_id = Auth::user()->id;
        $comment->save();
        return back()->with('success', 'Tu comentario ha sido publicado.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        if (auth()->user()->id !== $comment->user_id) {
            abort(403);
        }

        return view('/', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        if (auth()->user()->id !== $comment->user_id) {
            abort(403);
        }
    
        $comment->comment = $request->input('comment');
        $comment->save();
    
        return redirect()->back()->with('success', 'El comentario se ha actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        if ($comment->user_id === auth()->user()->id) {
            $comment->delete();
            return back()->with('success', 'El comentario se ha eliminado correctamente.');
        }
        return back()->with('error', 'No tienes permiso para eliminar este comentario.');
    }
}
