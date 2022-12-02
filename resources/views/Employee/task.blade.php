@extends('Employee.index')

@section('data')
    <div class="">
        <table class="table table-striped mt-1">
            <h3 class="mt-4">Task List</h3>
            <thead style="">
                <th>Title</th>
                <th>Description</th>
                <th>Company</th>
                <th>Deadline</th>
            </thead>
            <tbody>
                @if ($task)
                    @foreach ($task as $t)
                        <tr>
                            <td>{{ $t->title }}
                                @if ($t->is_new)
                                    <span class="badge bg-primary rounded-pill">New</span>
                                @endif
                                @if ($t->is_done == 'on_progress')
                                    <span class="badge bg-warning rounded-pill">On progress</span>
                                @endif
                            </td>
                            <td>{{ $t->description }}</td>
                            <td>{{ $t->company->name }}</td>
                            <td>{{ $t->deadline }}</td>
                            <td>
                                <a href="{{ url('/employee/task/' . $t->slug) }}">More Details</a>
                            </td>
                        </tr>
                    @endforeach
                @elseif(!$task)
                    <tr>
                        No task
                    </tr>
                @endif
            </tbody>
        </table>
        <hr>
        <div class="form-group">
            <h3>Compeleted Task List</h3>
            <table class="table table-striped">
                <thead>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Compeleted Date</th>
                </thead>
                <tbody>
                    @if ($finished_task)
                        @foreach ($finished_task as $ft)
                            @if ($ft->is_done == 'finished')
                                <tr>
                                    <td>{{ $ft->title }}</td>
                                    <td>{{ $ft->description }}</td>
                                    <td>{{ $ft->finished_date }}</td>
                                    <td>
                                        <a href="#">More details</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                        <tr>
                            <h4>No compeleted task</h4>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
