@extends('Admin.master')

@section('content')
    <h3 class="">Task List</h3>

    <hr>

    <div class="">
        <a href="{{ route('task.create') }}" class="btn btn-primary">Add Tasks</a>
    </div>

    {{-- <hr> --}}

    <table class="table table-striped mt-3" style="max-height: 30vh;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Company</th>
                {{-- <th>Employee</th> --}}
                <th>Status</th>
                <th>Deadline</th>
            </tr>
        </thead>
        <tbody style="overflow: scroll">

            @foreach ($tasks as $t)
                <tr>
                    <td>{{ $t->title }}</td>
                    <td>{{ $t->description }}</td>
                    <td>{{ $t->company->name }}</td>
                    <td>{{ $t->is_done }}</td>
                    <td>{{ $t->deadline }}</td>
                    <td>
                        <a href="{{ url('/admin/task/detail/' . $t->slug) }}">Details</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('script')
    <script src="{{ mix('js/admin.js') }}"></script>
@endsection
