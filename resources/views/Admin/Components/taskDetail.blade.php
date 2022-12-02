@extends('Admin.master')

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            <a href="{{ url('/admin/task') }}" class="fs-4 text-white"><i class="fa-solid fa-arrow-left"></i></a>
            <h3 class="text-white d-inline-block ms-1">Task Detail</h3>
        </div>
        <div class="card-body">
            <div class="">
                <label for="">Company - </label>
                <p class="d-inline-block fw-bold">{{ $detail->company->name }}</p>
            </div>

            <div class="">
                <label for="">Task Name - </label>
                <p class="d-inline-block fw-bold">{{ $detail->title }}</p>
            </div>

            <div class="">
                <label for="">Description -</label>
                <p class="d-inline-block">{{ $detail->description }}</p>
            </div>

            <div class="">
                <label for="">Stage -</label>
                <p class="d-inline-block">{{ $detail->is_done }}</p>
            </div>

            <div class="">
                <label for="">Deadline - </label>
                <p class="d-inline-flex">{{ $detail->deadline }}</p>
            </div>

            <a href="{{ route('task.edit', $detail->slug) }}" class="btn btn-dark">Edit</a>

            <form action="{{ route('task.destroy', $detail->slug) }}" method="POST" class="d-inline-block">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete" class="btn btn-danger d-block ms-auto"
                    onclick="return confirm('Are you sure to delete?')">
            </form>
        </div>
    </div>
@endsection
