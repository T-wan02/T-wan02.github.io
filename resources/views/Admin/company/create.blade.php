@extends('Admin.master')

@section('content')
    <div>
        <a href="{{ route('company.index') }}" class="btn btn-dark">All companies</a>
    </div>

    <hr>

    <div class="card">
        <div class="card-header">
            <h2>Add Company</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('company.store') }}" method="POST">
                @csrf

                @if ($errors->any())
                    @foreach ($errors->all() as $e)
                        <div class="alert alert-danger">
                            <span class="">{{ $e }}</span>
                        </div>
                    @endforeach
                @endif

                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" name="address" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Website</label>
                    <input type="text" name="website" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <input type="submit" class="ms-auto d-block btn btn-dark" value="Create">
            </form>
        </div>
    </div>
@endsection
