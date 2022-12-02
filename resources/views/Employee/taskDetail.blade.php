@extends('Employee.index')

@section('data')
    <div class="card mt-3">
        <div class="card-header bg-primary">
            <div class="">
                <a href="{{ url('/employee/task') }}" class="fs-4 text-white"><i class="fa-solid fa-arrow-left"></i></a>
                <h2 class="text-white d-inline-block ms-2">{{ $task->title }}'s Details</h2>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ url('/employee/task/start/' . $task->slug) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Task Title - </label>
                    <span>{{ $task->title }}</span>
                </div>
                <div class="form-group">
                    <label for="">Description - </label>
                    <span>{{ $task->description }}</span>
                </div>
                <div class="form-group">
                    <label for="">Company - </label>
                    <span>{{ $task->company->name }}</span>
                </div>
                <div class="form-group">
                    <label for="">Stage - </label>
                    <span>{{ $task->is_done }}</span>
                </div>
                <div class="form-group">
                    <label for="">Deadline - </label>
                    <span>{{ $task->deadline }}</span>
                </div>
                @if ($task->is_done !== 'on_progress')
                    <input type="submit" value="Start" class="btn btn-primary d-block ms-auto">
                @endif
                {{-- @if ($task->is_done === 'on_progress')
                    <form action="{{ url('/employee/submit-task') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Submit file - </label>
                            <input type="file" class="form-control" name="submitted_file">
                        </div>
                        <input type="submit" value="Submit Task" class="btn btn-primary d-block ms-auto">
                    </form>
                @endif --}}
            </form>
        </div>
    </div>
@endsection
