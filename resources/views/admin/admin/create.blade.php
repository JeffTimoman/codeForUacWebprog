@extends('layout.app')

@section('title')
    Article
@endsection

@section('style')
@endsection

@section('content')
     <div class="container d-flex align-items-center justify-content-center py-4">
        <div class="col-md-4">
            <form action="" method="POST">
                @csrf
                <h3 class="border-bottom">Add Admin</h3>
                <div class="col-md-12 mt-2">
                    <label for="" class="form-label"><strong>Name:</strong></label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="col-md-12 mt-2">
                    <label for="" class="form-label"><strong>Email:</strong></label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="col-md-12 mt-2">
                    <label for="" class="form-label"><strong>Phone:</strong></label>
                    <input type="phone" class="form-control" name="phone">
                </div>
                <div class="col-md-12 mt-2">
                    <label for="" class="form-label"><strong>Password:</strong></label>
                    <input type="password" class="form-control" name="password">
                </div>

                <button class="btn btn-outline-secondary mt-2">Add</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
@endsection
