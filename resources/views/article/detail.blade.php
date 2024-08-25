@extends('layout.app')

@section('title')
    Detail
@endsection

@section('style')
@endsection

@section('content')
    <div class="container py-2">
        <a href="{{ route('guest.article', ['name' => $article->category->name]) }}" class="btn btn-secondary">
            Back
        </a>
        <div class="row">
            <h1>{{ $article->title }}</h1>
            <p>{{ $article->created_at->format('d M Y') }}</p>
            <p>Kontributor : {{ $article->author->name }}</p>
            <img src="{{asset('posts/'.$article->image)}}" alt="">
            <p>{{ $article->description }}</p>
        </div>
    </div>
@endsection

@section('script')
@endsection
