<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
/**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::latest()->get();

        return view('tag.index', [
            'tags' => $tags,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => ['required', 'unique:tags,name'],
        ]);

        $tag = Tag::create([
            'name' => request('name'),
        ]);

        return redirect('/tags');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('tag.edit', [
            'tag' => $tag,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        request()->validate([
            'name' => ['required'],
        ]);

        $tag->update([
            'name' => request('name'),
        ]);

        return redirect('/tags');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect('/tags');
    }
}
