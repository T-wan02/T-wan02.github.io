@extends('Admin.master')

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            <h4 class="text-white">Resign Detail</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="">Role - </label>
                <span>{{ $resign->employee->role->name }}</span>
            </div>
            <div class="form-group">
                <label for="">Company - </label>
                <span>{{ $resign->company->name }}</span>
            </div>
            <div class="form-group">
                <label for="">Reason - </label>
                <span>{{ $resign->reason }}</span>
            </div>
            <form action="{{ url('/admin/submit-resign/' . $resign->slug) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Desicion - </label>
                    <select name="desicion" id="desicion" class="form-control d-inline-block w-25">
                        <option value="choose">Choose</option>
                        <option value="pending">Pending</option>
                        <option value="accept">Accept</option>
                        <option value="reject">Reject</option>
                    </select>
                </div>
                <div id="container" style="display: none">
                    <div class="form-group">
                        <label for="">Pending Time</label>
                        <input type="date" class="form-control" name="pending_time">
                    </div>
                    <div class="form-group">
                        <label for="">Pending Reason</label>
                        <input type="text" class="form-control" name="pending_reason">
                    </div>
                    <input type="submit" class="btn btn-dark" value="Submit">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            //   $('#desicion').select2();
        });

        const desicion = document.getElementById('desicion');
        const container = document.getElementById('container');


        desicion.addEventListener('change', () => {
            console.log(desicion.value);

            if (desicion.value === 'reject') {
                container.style.display = 'block';
            } else {
                container.style.display = 'none';
            }
        })
    </script>
@endsection
