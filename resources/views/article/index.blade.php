@extends('layouts.app')

@section('content')
    <div class="container">

        @foreach ($articles as $article)
            <a href="{{ route('article.show', $article->id) }}" class="text-decoration-none">
                <div class="card mb-3">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ $article->content }}</p>
                        <p class="card-text"><small class="text-muted">{{ $article->created_at }}</small></p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
