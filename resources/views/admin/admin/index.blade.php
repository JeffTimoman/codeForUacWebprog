@extends('layout.app')

@section('title')
    Article
@endsection

@section('style')
@endsection

@section('content')
    <div class="container d-flex justify-content-center align-items-center mt-2">
        <div class="col-md-4">
            <h3>Admin List: </h3>
        </div>
        <div class="col-md-4">
            <a href="{{ route('admin.admin.create') }}" class="btn btn-outline-info">{{ '+ Add Admin' }}</a>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <th>Title</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                        @if ($admins->count() == 0)
                            <tr>
                                <td colspan="2" class="text-center">No Data</td>
                            </tr>
                        @else
                            @foreach ($admins as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
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
