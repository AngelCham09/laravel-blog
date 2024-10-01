@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Eg: Computer Science">
                <x-error name="name"></x-error>
            </div>
            <button class="mt-5 btn btn-info">Add Category</button>
        </form>
    </div>
@endsection
