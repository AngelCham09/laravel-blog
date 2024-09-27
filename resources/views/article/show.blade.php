@extends('layouts.app')

@section('content')
    <div class="container">
        <article class="flex justify-center">
            <!-- Post header-->
            <header class="mb-4">
                <!-- Post title-->
                <h1 class="fw-bolder mb-1">{{ $article->title }}</h1>
                <!-- Post meta content -->
                <div class="text-muted fst-italic mb-2">Posted on {{ $article->created_at }}</div>
                <!-- Post categories-->
                @foreach ($article->tags as $tag)
                    <a class="badge bg-secondary text-decoration-none link-light" href="#!">{{ $tag->name }}</a>
                @endforeach
            </header>
            <figure class="mb-4"><img class="img-fluid rounded" src="https://dummyimage.com/900x400/ced4da/6c757d.jpg"
                    alt="..."></figure>
            <section class="mb-5">{{ $article->content }}</section>
        </article>
    </div>
@endsection
