@extends('Employee.index')

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            <h4 class="text-white">Resign Form</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('/employee/post-resign') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Reason :</label>
                    <textarea name="reason" class="form-control"></textarea>
                </div>
                <input type="submit" class="btn btn-dark d-block ms-auto">
            </form>
        </div>
    </div>
@endsection
