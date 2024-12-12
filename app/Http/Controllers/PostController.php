<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // Certifique-se de importar o modelo Post

class PostController extends Controller
{
    // Exibe o formulário de criação de post
    public function create()
    {
        return view('posts.create');
    }

    // Armazena um novo post
    public function store(Request $request)
    {
        // Valida os dados recebidos
        $validated = $request->validate([
            'title' => ['required', 'min:5', 'max:255'],
            'content' => ['required', 'min:10'],
            'thumbnail' => ['required', 'image'],
        ]);

        $validated['thumbnail'] - $request->file('thumnail')->store('thumbnails');

        // Cria um novo post
        Post::create($validated);

        // Redireciona para uma página (ex.: lista de posts) com uma mensagem de sucesso
        return redirect()->route('posts.index')->with('success', 'Post criado com sucesso!');
    }
}
