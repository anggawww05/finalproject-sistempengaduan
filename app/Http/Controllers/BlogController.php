<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(Request $request): View
    {
        if ($request->search) {
            $blogs = Blog::where('title', 'like', "%$request->search%")
                ->orWhere('description', 'like', "%$request->search%")
                ->orWhereHas('user', function ($query) use ($request) {
                    $query->where('username', 'like', "%$request->search%")
                        ->where('email', 'like', "%$request->search%");
                })
                ->latest()
                ->get();
        } else {
            $blogs = Blog::latest()->get();
        }
        return view('dashboard.blog.index', [
            'title' => 'Halaman Blog',
            'blogs' => $blogs,
            'search' => $request->search,
        ]);
    }

    public function show(int $id): View
    {
        return view('dashboard.blog.detail', [
            'title' => 'Halaman Detail Blog',
            'blog' => Blog::with('user')->where('id', $id)->firstOrFail(),
        ]);
    }

    public function create(): View
    {
        return view('dashboard.blog.create', [
            'title' => 'Halaman Tambah Blog',
        ]);
    }

    public function store(BlogStoreRequest $request)
    {
        $imagePath = null;

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/blog'), $imageName);
            $imagePath = 'images/blog/' . $imageName;
        }

        $blog = Blog::create([
            'image_path' => $imagePath,
            'user_id' => $request->user_id,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        if ($blog) return redirect(route('dashboard.blog.index'))->with('success', 'Berhasil membuat blog!');
        return redirect(route('dashboard.blog.index'))->with('failed', 'Gagal membuat blog!');
    }

    public function edit(int $id): View
    {
        return view('dashboard.blog.edit', [
            'title' => 'Halaman Edit Blog',
            'blog' => Blog::with('user')->where('id', $id)->firstOrFail(),
        ]);
    }

    public function update(BlogUpdateRequest $request, int $id)
    {
        $blog = Blog::with('user')->where('id', $id)->firstOrFail();
        $imagePath = $blog->image_path;

        if ($request->hasFile('image_path')) {
            if ($blog->image_path && file_exists(public_path($blog->image_path))) {
                unlink(public_path($blog->image_path));
            }

            $image = $request->file('image_path');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/blog'), $imageName);
            $imagePath = 'images/blog/' . $imageName;
        }

        $blog->update([
            'image_path' => $imagePath,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        if ($blog) return redirect(route('dashboard.blog.index'))->with('success', 'Berhasil mengedit blog!');
        return redirect(route('dashboard.blog.index'))->with('failed', 'Gagal mengedit blog!');
    }

    public function destroy(int $id)
    {
        $blog = Blog::with('user')->where('id', $id)->firstOrFail();

        if ($blog->image_path && file_exists(public_path($blog->image_path))) {
            unlink(public_path($blog->image_path));
        }

        $blog->delete();

        return redirect(route('dashboard.blog.index'))->with('success', 'Berhasil menghapus blog!');
    }
}
