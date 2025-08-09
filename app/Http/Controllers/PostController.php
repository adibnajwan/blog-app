<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str; 

class PostController extends Controller
{
    // Menampilkan semua post
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    // Menampilkan form tambah post
    public function create()
    {
        return view('posts.create');
    }

    // Menyimpan post baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'), // Membuat slug otomatis
            'content' => $request->content,
            'user_id' => auth()->id(), // Mengambil ID user yang sedang login
        ]);

        return redirect()->route('posts.index')->with('success', 'Post berhasil dibuat!');
    }

    // Menampilkan form edit post
    public function edit(Post $post)
    {
        // Pastikan hanya pemilik post yang bisa edit
        $this->authorize('update', $post);

        return view('posts.edit', compact('post'));
    }

    // Memperbarui post
    public function update(Request $request, Post $post)
    {
        // Pastikan hanya pemilik post yang bisa update
        $this->authorize('update', $post);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->update([
            'title'   => $request->title,
            'slug'    => Str::slug($request->title, '-'),
            'content' => $request->content,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post berhasil diperbarui!');
    }

    // Menghapus post
    public function destroy(Post $post)
    {
        // Pastikan hanya pemilik post yang bisa hapus
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post berhasil dihapus!');
    }
}