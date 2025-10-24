<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    // Exibir página de blog (pública)
    public function index()
    {
        $posts = Post::where('published', true)
                    ->orderBy('published_at', 'desc')
                    ->paginate(9);
        return view('blog.index', compact('posts'));
    }

    // Exibir post individual (público)
    public function show($slug)
    {
        $post = Post::where('slug', $slug)
                   ->where('published', true)
                   ->firstOrFail();
        $recentPosts = Post::where('published', true)
                          ->where('id', '!=', $post->id)
                          ->orderBy('published_at', 'desc')
                          ->take(3)
                          ->get();
        return view('blog.show', compact('post', 'recentPosts'));
    }

    // Listar posts (admin)
    public function adminIndex()
    {
        $posts = Post::orderBy('published_at', 'desc')->paginate(15);
        return view('admin.posts.index', compact('posts'));
    }

    // Formulário de criação (admin)
    public function create()
    {
        return view('admin.posts.create');
    }

    // Armazenar novo post (admin)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published' => 'nullable|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['user_id'] = auth()->id();
        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', 'public');
            $validated['image'] = $path;
        }

        if ($request->has('published') && $request->published) {
            $validated['published_at'] = now();
        }

        Post::create($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Post criado com sucesso!');
    }

    // Formulário de edição (admin)
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    // Atualizar post (admin)
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published' => 'nullable|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('image')) {
            if ($post->image && \Storage::disk('public')->exists($post->image)) {
                \Storage::disk('public')->delete($post->image);
            }
            $path = $request->file('image')->store('posts', 'public');
            $validated['image'] = $path;
        }

        if ($request->has('published') && $request->published && !$post->published) {
            $validated['published_at'] = now();
        }

        $post->update($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Post atualizado com sucesso!');
    }

    // Deletar post (admin)
    public function destroy(Post $post)
    {
        if ($post->image && \Storage::disk('public')->exists($post->image)) {
            \Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Post deletado com sucesso!');
    }
}
