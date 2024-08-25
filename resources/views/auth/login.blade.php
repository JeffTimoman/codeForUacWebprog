@extends('layout.app')

@section('title')
    Login
@endsection

@section('style')
@endsection

@section('content')
    <div class="container d-flex align-items-center justify-content-center py-4">
        <div class="col-md-4">
            <h3 class="border-bottom">Login</h3>
            <form action="{{ route('auth.login_store') }}" method="POST">
                @csrf
                <div class="col-md-12">
                    <label for="" class="form-label"><strong>Login as : </strong></label>
                    <select name="login_as" id="" class="form-control">
                        <option value="user" class="form-control" selected>User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="col-md-12 mt-2">
                    <label for="" class="form-label"><strong>Email:</strong></label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="col-md-12 mt-2">
                    <label for="" class="form-label"><strong>Password:</strong></label>
                    <input type="password" class="form-control" name="password">
                </div>

                <button class="btn btn-outline-secondary mt-2" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
@endsection
