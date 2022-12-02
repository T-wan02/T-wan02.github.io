@extends('master')

@section('masterContent')
    <div class="container-item">
        <div class="left">
            {{-- <div id="root"></div> --}}
            @include('Admin.nav')
        </div>
        <div class="right">
            @yield('content')
        </div>
    </div>
@endsection

@section('script')
    {{-- <script src="{{ mix('js/admin.js') }}"></script> --}}
@endsection
