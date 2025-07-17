<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news', 'public');
        }
        News::create($data);
        return response()->json(['message' => 'Berita berhasil ditambahkan.']);
        // return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    // public function edit(News $news)
    // {
    //     return view('admin.news.edit', compact('news'));
    // }

    // public function update(Request $request, News $news)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'deskripsi' => 'required|string',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     $data = $request->only(['title', 'deskripsi']);

    //     if ($request->hasFile('image')) {
    //         if ($news->image) {
    //             Storage::disk('public')->delete($news->image);
    //         }
    //         $data['image'] = $request->file('image')->store('news', 'public');
    //     }

    //     $news->update($data);

    //     return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui.');
    // }

     public function edit($id)
    {
        $news = News::findOrFail($id);
        return response()->json($news);
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);
        $news->title = $request->input('title');
        $news->description = $request->input('description');
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('news_images', 'public');
            $news->image = $path;
        }
        $news->save();
        return response()->json(['message' => 'Berita berhasil diperbarui!', 'news' => $news]);
    }


    public function destroy(News $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus.');
    }
}
