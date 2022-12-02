@extends('Admin.master')

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            <a href="{{ url('/admin/employee') }}" class="text-white fs-4"><i class="fa-solid fa-arrow-left"></i></a>
            <h4 class="text-white d-inline-block ms-2">{{ $employee->name }}'s Profile</h4>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <img src="{{ asset('asset/images/' . $employee->profile) }}" alt="{{ $employee->profile }}" width="100">
            </div>
            <div class="">
                <div class="form-group">
                    <label for="">Phone - </label>
                    <span>{{ $employee->phone }}</span>
                </div>
                <div class="form-group">
                    <label for="">Address - </label>
                    <span>{{ $employee->address }}</span>
                </div>
                <div class="form-group">
                    <label for="">Email - </label>
                    <span>{{ $employee->email }}</span>
                </div>
                <div class="form-group">
                    <label for="">Role - </label>
                    <span>{{ $employee->role->name }}</span>
                </div>
                <div class="form-group">
                    <label for="">Salary - </label>
                    <span>{{ $employee->salary }}</span>
                </div>
                <div class="form-group">
                    <label for="">Started Date - </label>
                    <span>{{ $employee->created_at }}</span>
                </div>
                <div class="form-group">
                    <label for="">Task - </label>
                    <table class="table">
                        <thead>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Company</th>
                            <th>Deadline</th>
                            <th>Finished Date</th>
                        </thead>
                        <tbody>
                            @if (count($employee->task) !== 0)
                                @foreach ($employee->task as $t)
                                    <tr>
                                        <td>{{ $t->title }}</td>
                                        <td>{{ $t->description }}</td>
                                        <td>{{ $t->company->name }}</td>
                                        <td>{{ $t->deadline }}</td>
                                        <td>{{ $t->finished_date == null ? 'On progress' : $t->finished_date }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td align="center" colspan="5">
                                        <h4>There is no task list</h4>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
