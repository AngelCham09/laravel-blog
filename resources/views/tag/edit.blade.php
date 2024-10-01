@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('tags.update', $tag->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Tag Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Eg: Information Technology"
                    value="{{ $tag->name }}">
            </div>
            <button class="mt-5 btn btn-info">Update Tags</button>
        </form>
    </div>
@endsection
