@extends('layout.app')

@section('title')
    User
@endsection

@section('style')
@endsection

@section('content')
    <div class="container d-flex justify-content-center mt-2">
        <div class="col-md-4">
            <h3>User List: </h3>
        </div>
        <div class="col-md-4">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <th>Title</th>
                        <th>Email</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                         @if ($users->count() == 0)
                            <tr>
                                <td colspan="2" class="text-center">No Data</td>
                            </tr>
                        @else
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ $item->name}}</td>
                                    <td>{{ $item->email}}</td>
                                    <td>
                                        <form action="{{route('admin.user.delete')}}" method="POST">
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
        <div class="col-md-4">

        </div>
    </div>
@endsection

@section('script')
@endsection
