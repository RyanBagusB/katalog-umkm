<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Tampilkan daftar berita.
     */
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    /**
     * Form untuk membuat berita baru (opsional, jika perlu).
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Simpan berita baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'content'      => 'required|string',
            'image'        => 'nullable|image|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news', 'public');
        }

        News::create([
            'title'        => $request->title,
            'slug'         => Str::slug($request->title),
            'content'      => $request->content,
            'image'        => $imagePath,
            'published_at' => $request->published_at ?? now(),
        ]);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Form untuk mengedit berita.
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update berita di database.
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'content'      => 'required|string',
            'image'        => 'nullable|image|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $imagePath = $news->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news', 'public');
        }

        $news->update([
            'title'        => $request->title,
            'slug'         => Str::slug($request->title),
            'content'      => $request->content,
            'image'        => $imagePath,
            'published_at' => $request->published_at ?? $news->published_at,
        ]);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * Hapus berita dari database.
     */
    public function destroy(News $news)
    {
        $news->delete();

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
