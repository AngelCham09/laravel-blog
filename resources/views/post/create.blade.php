@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title">
                <x-error name="title"></x-error>

                <div class="mt-3">

                    <label for="content">Content</label>
                    <input type="text" class="form-control" id="content" name="content">
                    <x-error name="content"></x-error>
                </div>

                <select name="category_id" class="form-control mt-3 mb-4 form-select" aria-label="Default select example">
                    <option selected>Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <x-error name="category_id"></x-error>

                <div class="mt-3">

                    <label for="content">Tags</label>
                    <input type="text" class="form-control" id="tag" name="tag">
                    <x-error name="tag"></x-error>
                </div>

                <div class="mt-3">

                    <label for="content">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    <x-error name="image"></x-error>
                </div>
            </div>
            <button class="mt-5 btn btn-info">Add Posts</button>
        </form>
    </div>
@endsection
