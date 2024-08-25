@extends('layout.app')

@section('title')
@endsection

@section('style')
@endsection

@section('content')
    <div class="container d-flex justify-content-center align-items-center mt-2">
        <div class="col-md-4">
            <h3>News Article</h3>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12 mt-2">
                    <label for="" class="form-label"><strong>News Title:</strong></label>
                    <input type="text" class="form-control" name="title" value="">
                </div>
                <div class="col-md-12 mt-2">
                    <label for="" class="form-label"><strong>Category:</strong></label>
                    <select name="category_id" id="" class="form-control">
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}" class="form-control">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12 mt-2">
                    <label for="" class="form-label"><strong>Photo: </strong></label>
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="col-md-12 mt-2">
                    <label for="" class="form-label"><strong>News:</strong></label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <button class="btn btn-outline-secondary mt-2">Create</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
@endsection
