@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('tags.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Tag Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Eg: Information Technology">
                <x-error name="name"></x-error>
            </div>
            <button class="mt-5 btn btn-info">Add Tags</button>
        </form>
    </div>
@endsection
