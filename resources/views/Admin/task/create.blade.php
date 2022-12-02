@extends('Admin.master')

@section('content')
    <div>
        <a href="{{ route('task.index') }}" class="btn btn-dark">All Tasks</a>
    </div>

    <hr>

    <div class="card">
        <div class="card-header">
            <h2>Add Task</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('task.store') }}" method="POST">
                @csrf

                @if ($errors->any())
                    @foreach ($errors->all() as $e)
                        <div class="alert alert-danger">
                            <span class="">{{ $e }}</span>
                        </div>
                    @endforeach
                @endif

                <div class="form-group d-inline-block">
                    <label for="">Company</label>
                    <select name="company" id="company">
                        @foreach ($company as $c)
                            <option value="{{ $c->slug }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>

                {{-- <div class="form-group">
                    <label for="">Employee</label>
                    <input type="text" class="form-control" name="employee">
                </div> --}}

                <div class="form-group">
                    <label for="">Deadline</label>
                    <input type="date" name="deadline" class="form-control">
                </div>
                <input type="submit" class="ms-auto d-block btn btn-dark" value="Create">
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            // $('#role').select2();
            $('#company').select2();

            $('#requirement').summernote();
        })
    </script>
@endsection
