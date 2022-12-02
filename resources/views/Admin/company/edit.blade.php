@extends('Admin.master')

@section('content')
    <div>
        <a href="{{ route('company.index') }}" class="btn btn-dark">All companies</a>
    </div>

    <hr>

    <div class="card">
        <div class="card-header">
            <h2>Edit {{ $company->name }} Company</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('company.update', $company->slug) }}" method="POST">
                @csrf
                @method('PUT')

                @if ($errors->any())
                    @foreach ($errors->all() as $e)
                        <div class="alert alert-danger">
                            <span class="">{{ $e }}</span>
                        </div>
                    @endforeach
                @endif

                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $company->name }}">
                </div>

                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control">{{ $company->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" name="address" class="form-control" value="{{ $company->address }}">
                </div>

                <div class="form-group">
                    <label for="">Website</label>
                    <input type="text" name="website" class="form-control" value="{{ $company->website }}">
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $company->email }}">
                </div>
                <input type="submit" class="ms-auto d-block btn btn-dark" value="Update">
            </form>
        </div>
    </div>
@endsection
