@extends('Admin.master')

@section('content')
    <div>
        <a href="{{ route('hiring.index') }}" class="btn btn-dark">All Details</a>
    </div>

    <br>

    <div class="card">
        <div class="card-header">
            <h2>{{ $enrollmentProfile->name }}</h2>
        </div>
        <div class="card-body d-flex">
            <a href="{{ asset('asset/images/' . $enrollmentProfile->resume) }}" target="blank">
                <img src="{{ asset('asset/images/' . $enrollmentProfile->resume) }}" alt="{{ $enrollmentProfile->resume }}"
                    width="400" style="border: 1px solid black">
            </a>
            <div class="ms-4">
                <div class="form-group">
                    <label for="">Name :</label>
                    {{ $enrollmentProfile->name }}
                </div>
                <div class="form-group">
                    <label for="">Email :</label>
                    {{ $enrollmentProfile->email }}
                </div>
                <div class="form-group">
                    <label for="">Phone :</label>
                    {{ $enrollmentProfile->phone }}
                </div>
                <div class="form-group">
                    <label for="">Address :</label>
                    {{ $enrollmentProfile->address }}
                </div>
                <div class="form-group">
                    <label for="">Estimated Salary :</label>
                    {{ $enrollmentProfile->estimated_salary }} kyats
                </div>
                <div class="form-group">
                    <label for="">Role :</label>
                    {{ $enrollmentProfile->role->name }}
                </div>
                <div class="form-group">
                    <label for="">Company :</label>
                    {{ $enrollmentProfile->company->name }}
                </div>
                <div class="form-group">
                    <label for="">Enrollment Date :</label>
                    {{ $enrollmentProfile->created_at }}
                </div>
                <form action="{{ url('/admin/enrollment/post-status/' . $enrollmentProfile->slug) }}" method="POST">
                    @csrf
                    <label for="">Status :</label>
                    <select name="status" id="status">
                        <option value="pending">pending</option>
                        <option value="interview">interview</option>
                        <option value="reject">reject</option>
                    </select>
                    <input type="submit" class="btn btn-dark" value="submit">
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            $('#status').select2();
        })
    </script>
@endsection
