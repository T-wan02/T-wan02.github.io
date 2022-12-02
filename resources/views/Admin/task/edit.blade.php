@extends('Admin.master')

@section('content')
    <div>
        <a href="{{ route('task.index') }}" class="btn btn-dark">All Task List</a>
    </div>

    <hr>

    <div class="card">
        <div class="card-header bg-secondary">
            <a href="{{ url('/admin/task/detail/' . $task->slug) }}" class="text-white fs-4"><i
                    class="fa-solid fa-arrow-left"></i></a>
            <h2 class="text-white d-inline-block ms-2">Edit {{ $task->title }} Company</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('company.update', $task->slug) }}" method="POST">
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
                    <label for="">Employee - </label>
                    {{-- <input type="text" name="employee" class="form-control" value="{{ $task->employee->name }}"> --}}
                    <select name="employee" id="employee">
                        <option value="">Choose</option>
                        @foreach ($employee as $e)
                            <option value="{{ $e->name }}">{{ $e->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $task->title }}">
                </div>

                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control">{{ $task->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="">Deadline</label>
                    <input type="date" name="deadline" class="form-control" value="{{ $task->deadline }}">
                </div>
                <input type="submit" class="ms-auto d-block btn btn-dark" value="Update">
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            $('#employee').select2();
        })
    </script>
@endsection
