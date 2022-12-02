@extends('master')

@section('masterContent')
    <div class="row">
        <div class="col-4 offset-4 mt-5">
            <div class="card mt-5">
                <div class="card-header bg-primary text-center">
                    <h2 class="text-white">Admin Login</h2>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/login') }}" method="POST">
                        @csrf
                        {{-- <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter name">
                        </div> --}}
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter password">
                        </div>
                        <input type="submit" value="Login" class="btn btn-primary d-block ms-auto">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
