@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Eg: Computer Science"
                    value="{{ $category->name }}">
            </div>
            <button class="mt-5 btn btn-info">Update Category</button>
        </form>
    </div>
@endsection
