@extends('master')

@section('masterContent')
    <div class="row">
        <div class="col-4 offset-4">
            <div class="card mt-5">
                <div class="card-header bg-primary">
                    <h4 class="text-white text-center">Login for Employee</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $e)
                            <div class="alert alert-danger">
                                <span class="">{{ $e }}</span>
                            </div>
                        @endforeach
                    @endif
                    <form action="{{ url('/employee/post-login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Email :</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="">Password :</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter password">
                        </div>
                        <input type="submit" value="Login" class="btn btn-primary d-block ms-auto">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
