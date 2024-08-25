@extends('layout.app')

@section('title')
    Profile
@endsection

@section('style')
@endsection

@section('content')
    <div class="container d-flex justify-content-center align-items-center mt-4">
        <div class="col-md-4">
            <form action="" method="POST">
                @csrf
                <div class="col-md-12">
                    <label for="" class="form-label"><strong>Name: </strong></label>
                    <input type="text" name="name" class="form-control" value="{{auth()->user()->name}}">
                </div>

                <div class="col-md-12 mt-2">
                    <label for="" class="form-label"><strong>Email: </strong></label>
                    <input type="email" name="email" class="form-control" value="{{auth()->user()->email}}">
                </div>
                <div class="col-md-12 mt-2">
                    <label for="" class="form-label"><strong>Phone: </strong></label>
                    <input type="phone" name="phone" class="form-control" value="{{auth()->user()->phone}}">
                </div>
                <div class="col-md-4 mt-2">
                    <button class="btn btn-outline-secondary mt-2" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
@endsection
