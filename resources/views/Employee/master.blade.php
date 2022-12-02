@extends('master')

@section('style')
    @yield('style')
@endsection

@section('masterContent')
    <div class="container-item">
        <div class="left">
            @include('Employee.nav')
        </div>
        <div class="right">
            @yield('content')
        </div>
    </div>
@endsection

@section('script')
    {{-- <script src="{{ mix('js/employee.js') }}"></script> --}}
    @yield('script')
@endsection
