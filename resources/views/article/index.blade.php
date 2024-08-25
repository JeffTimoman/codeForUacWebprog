@extends('layout.app')

@section('title')
    Home
@endsection

@section('style')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $category->name }}</h1>
            </div>

            @foreach ($category->articles as $item)
                <div class="col-md-4">
                    <div class="card mt-1">
                        <div class="card-body">
                            <a href="{{route('guest.article.show', ['id' => $item->id])}}">
                                <h5 class="card-title">{{ $item->title }}</h5>
                            </a>
                            <p class="card-text m-0">{{ $item->created_at->format('d M Y') }}</p>
                            <p class="card-text m-0 py-1">Kontributor : {{ $item->author->name }}</p>
                            <p class="card-text">{{ Str::limit($item->description, 50) }}
                                <a href="{{route('guest.article.show', ['id' => $item->id])}}">...[Selengkapnya]</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('script')
@endsection
