@extends('Admin.master')

@section('content')
    <h3 class="pt-3">Hiring Job Lists</h3>

    <br>

    <div class="">
        <a href="{{ route('hiring.create') }}" class="btn btn-primary">Create Job Post</a>
    </div>

    {{-- <hr> --}}

    <table class="table table-striped mt-3" style="max-height: 30vh;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Role</th>
                <th>Company</th>
                <th>Requirement</th>
                <th>Interview Date</th>
                <th>Deadline</th>
            </tr>
        </thead>
        <tbody style="overflow: scroll">

            @foreach ($hiring as $h)
                <tr>
                    <td>{{ $h->name }}</td>
                    <td>{{ $h->description }}</td>
                    <td>{{ $h->role->name }}</td>
                    <td>{{ $h->company->name }}</td>
                    <td>{{ $h->requirement }}</td>
                    <td>{{ $h->interview_date }}</td>
                    <td>{{ $h->deadline }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $hiring->links() }}

    <hr>

    <h2>Enrollment List</h2>

    <br>

    <form action="{{ route('hiring.index') }}" method="POST">
        @csrf
        <div class="form-group d-inline-block me-4">
            <label for="">Company</label>
            <select name="company" id="company">
                <option value="">Choose</option>
                @foreach ($company as $c)
                    <option value="{{ $c->slug }}">{{ $c->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group d-inline-block me-4">
            <label for="">Role</label>
            <select name="role" id="role">
                <option value="">Choose</option>
                @foreach ($role as $r)
                    <option value="{{ $r->slug }}">{{ $r->name }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Search" class="btn btn-dark">
    </form>

    <table class="table table-striped">
        <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Role</th>
            <th>Estimated Salary</th>
            <th>Company</th>
            <th>Hiring Job Title</th>
            <th>Status</th>
        </thead>
        <tbody>
            @foreach ($enrollment as $e)
                <tr>
                    <td>{{ $e->name }}</td>
                    <td>{{ $e->email }}</td>
                    <td>{{ $e->phone }}</td>
                    <td>{{ $e->address }}</td>
                    <td>{{ $e->role->name }}</td>
                    <td>{{ $e->estimated_salary }}</td>
                    <td>{{ $e->company->name }}</td>
                    <td>{{ $e->hiring->name }}</td>
                    <td>{{ $e->status }}</td>
                    <td><a href="{{ url('/admin/enrollment/' . $e->slug) }}">Details</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('script')
    <script>
        $(function() {
            $('#company').select2();
            $('#role').select2();
        })
    </script>
@endsection
