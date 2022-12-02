@extends('Employee.master')

@section('style')
    <style>
        nav a {
            text-decoration: none;
            margin-right: 2rem;
            font-size: 1.5rem;
            opacity: .8;
            transition: opacity 0.3s ease;
        }

        nav a:hover {
            opacity: 1
        }

        nav a.active {
            border-bottom: 5px solid rgb(79, 79, 250);
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="">
            <div class="d-flex align-items-center">
                <img src="{{ asset('asset/images/' . $loginEmployee->profile) }}" alt="{{ $loginEmployee->profile }}"
                    width="100" style="border-radius: 50%" class="shadow bg-body">
                <a href="#" style="text-decoration: none">
                    <h4 class="text-secondary ms-4">{{ $loginEmployee->name }}</h4>
                </a>
            </div>
            {{-- <hr> --}}
            <nav class="card-body mt-4 d-flex justify-content-aroun">
                <a href="{{ url('/employee/task') }}"
                    class="text-secondary {{ URL::current() === 'http://127.0.0.1:8000/employee/task' ? 'active' : '' }}">Task</a>
                <a href="{{ url('/employee/profile/' . $loginEmployee->slug) }}"
                    class="text-secondary {{ URL::current() === 'http://127.0.0.1:8000/employee/profile/' . auth()->user()->slug ? 'active' : '' }}">Profile</a>
            </nav>
            <hr class="m-0">
            @yield('data')
        </div>
    </div>
@endsection

@section('script')
    @yield('script')
@endsection
