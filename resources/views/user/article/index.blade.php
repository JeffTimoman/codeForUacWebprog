@extends('layout.app')

@section('title')
    Article
@endsection

@section('style')
@endsection

@section('content')
    <div class="container d-flex justify-content-center align-items-center mt-2">
        <div class="col-md-4">
            <a href="{{route('user.article.create')}}" class="btn btn-outline-info">{{ '+ Create Blog' }}</a>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <th>Title</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                        @if ($articles->count() == 0)
                            <tr>
                                <td colspan="2" class="text-center">No Data</td>
                            </tr>
                        @else
                            @foreach ($articles as $item)
                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        <form action="{{route('user.article.delete')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$item->id}}">

                                            <button type="submit" class="btn btn-outline-primary">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
