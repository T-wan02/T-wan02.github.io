@extends('Admin.master')

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="text-white">Interview List</h3>
        </div>
        <div class="card-body">
            <form class="form-group" action="{{ url('/admin/interview/') }}" method="GET">
                @csrf
                <label for="">Status - </label>
                <select name="result" id="result">
                    <option value="all">All</option>
                    <option value="accept">Accept</option>
                    <option value="reject">Reject</option>
                    <option value="pending">Pending</option>
                </select>
                <input type="submit" value="Submit" class="btn btn-dark">
            </form>

            @if (count($interview) == 0)
                <h4 class="mx-auto text-secondary text-center">There is no one yet</h4>
            @endif

            @if (count($interview) > 0)
                <table class="table table-striped">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Resume</th>
                        <th>Position</th>
                        <th>Company</th>
                        <th>Result</th>
                    </thead>
                    <tbody>
                        @foreach ($interview as $i)
                            <tr>
                                <td>{{ $i->name }}</td>
                                <td>{{ $i->email }}</td>
                                <td>{{ $i->enrollment->phone }}</td>
                                <td>
                                    <a href="{{ asset('asset/images/' . $i->resume) }}" target="blank">
                                        <img src="{{ asset('asset/images/' . $i->resume) }}" alt="{{ $i->resume }}"
                                            width="100">
                                    </a>
                                </td>
                                <td>{{ $i->role->name }}</td>
                                <td>{{ $i->company->name }}</td>
                                <td>
                                    @if ($i->result == 'accept')
                                        <p class="badge rounded-pill bg-success d-block">Accepted</p>
                                        <form
                                            action="{{ url('/employee/register/' . $i->slug . '/' . $i->company->slug . '/' . $i->role->slug) }}"
                                            method="GET">
                                            {{-- <a href="/employee/register">register</a> --}}
                                            <input type="submit" value="Register" class="btn btn-outline-primary">
                                        </form>
                                    @elseif($i->result == 'reject')
                                        <span class="badge rounded-pill bg-danger">Reject</span>
                                    @elseif ($i->result == 'pending')
                                        <span class="badge rounded-pill bg-warning">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    {{-- <form action="{{ url('/employee/register') }}"></form> --}}
                                    <a href="{{ url('/admin/interview/detail/' . $i->slug) }}">More Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            $('#result').select2();
        })
    </script>
@endsection
