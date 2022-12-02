@extends('Admin.master')

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="text-white">Resigning Employees</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>Employee Name</th>
                    <th>Company</th>
                    <th>Reason</th>
                    <th>Resign Date</th>
                </thead>
                <tbody>
                    @foreach ($resign as $r)
                        <tr>
                            <td>{{ $r->employee->name }}</td>
                            <td>{{ $r->company->name }}</td>
                            <td>{{ $r->reason }}</td>
                            <td>{{ $r->created_at }}</td>
                            <td>
                                <a href="{{ url('/admin/resign-detail/' . $r->slug) }}">More Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
