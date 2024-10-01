<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rules\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Article::latest()->with([
            'category',
            'tags'
        ])->get();

        return view('post.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'title' => ['required'],
            'content' => ['required'],
            'category_id' => ['required', 'exists:category,id'],
            'tag' => ['nullable'],
            'image' => ['required', File::types(['png', 'jpg', 'webp'])],
        ]);

        $imagePath = $request->image->store('post', 'public');
        $attributes['image'] = $imagePath;

        $post = Article::create(
            Arr::except($attributes, "tag")
        );

        if ($attributes['tag'] ?? false) {
            foreach (explode(',', $attributes['tag']) as $tag) {
                $post->tag($tag);
            }
        }

        return redirect('/post');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $post)
    {
        return view('post.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $post)
    {
        $attributes = $request->validate([
            'title' => ['required'],
            'content' => ['required'],
            'category_id' => ['required', 'exists:category,id'],
            'tag' => ['nullable'],
            'image' => ['nullable', File::types(['png', 'jpg', 'webp'])], // image not required for edit
        ]);

        // If a new image is uploaded, store it and update the path
        if ($request->hasFile('image')) {
            $imagePath = $request->image->store('post', 'public');
            $attributes['image'] = $imagePath;
        }

        // Update the post with the validated data
        $post->update(
            Arr::except($attributes, 'tag')
        );

        return redirect('/post');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $post)
    {
        $post->delete();

        return redirect('/post');
    }
}
