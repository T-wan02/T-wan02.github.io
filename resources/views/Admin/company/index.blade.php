@extends('Admin.master')

@section('content')
    <h3 class="">Company Details</h3>

    <hr>

    <div class="">
        <a href="{{ route('company.create') }}" class="btn btn-primary">Add</a>
    </div>

    {{-- <hr> --}}

    <table class="table table-striped mt-3" style="max-height: 30vh;">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Website</th>
                <th>Email</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody style="overflow: scroll">

            @foreach ($company as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td>{{ $c->name }}</td>
                    <td>{{ $c->description }}</td>
                    <td><a href="{{ $c->website }}">{{ $c->website }}</a></td>
                    <td>{{ $c->email }}</td>
                    <td>
                        <a href="{{ route('company.edit', $c->slug) }}" class="btn btn-dark">Edit</a>
                        <form action="{{ route('company.destroy', $c->slug) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                    <td><a href="{{ url('/admin/company/more-detail/' . $c->slug) }}">More Detail</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('script')
    <script src="{{ mix('js/admin.js') }}"></script>
@endsection
