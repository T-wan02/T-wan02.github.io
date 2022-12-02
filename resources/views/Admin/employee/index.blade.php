@extends('Admin.master')

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <h3 class="">Employees</h3>

    <hr>

    <div class="">
        {{-- <a href="{{ route('employee.create') }}" class="btn btn-primary">Add</a> --}}

        <form action="{{ route('employee.index') }}" method="GET" id="companySubmit">
            @csrf
            <div class="form-group">
                <label for="">Select Company : </label>
                <select name="company" id="company">
                    <option value="">Choose</option>
                    <option value="all">All</option>
                    @foreach ($company as $c)
                        <option value="{{ $c->slug }}">{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
            {{-- <input type="submit" class="btn btn-dark d-inline-block" value="Search"> --}}
        </form>


    </div>

    {{-- <hr> --}}

    <table class="table table-striped mt-3" style="max-height: 30vh;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Email</th>
                <th>Role</th>
                <th>Salary</th>
                <th>Company</th>
            </tr>
        </thead>
        <tbody style="overflow: scroll">

            @foreach ($employee as $e)
                <tr>
                    <td>{{ $e->name }}</td>
                    <td>{{ $e->phone }}</td>
                    <td>{{ $e->address }}</td>
                    <td>{{ $e->email }}</td>
                    <td>{{ $e->role->name }}</td>
                    <td>{{ $e->salary }}</td>
                    <td>{{ $e->company->name }}</td>
                    <td>
                        <a href="{{ url('/admin/employee/detail/' . $e->slug) }}">Details</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(function() {
            // $('#company').select2();
        })

        const company = document.getElementById('company');
        const companySubmit = document.getElementById('companySubmit');

        company.addEventListener('change', function() {
            companySubmit.submit();
        });
    </script>
@endsection
@section('script')
    <script src="{{ mix('js/admin.js') }}"></script>
@endsection
