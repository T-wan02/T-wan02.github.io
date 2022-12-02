@extends('Admin.master')

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            <h4 class="text-white">{{ $interview->name }}'s interview details</h4>
        </div>
        <div class="card-body d-flex">
            <a href="{{ asset('asset/images/' . $interview->enrollment->resume) }}" target="blank">
                <img src="{{ asset('asset/images/' . $interview->enrollment->resume) }}"
                    alt="{{ $interview->enrollment->resume }}" class="border" width="300">
            </a>
            <div class="container">
                <div class="form-group">
                    <label for="">Name - </label>
                    {{ $interview->name }}
                </div>
                <div class="form-group">
                    <label for="">Email - </label>
                    {{ $interview->email }}
                </div>
                <div class="form-group">
                    <label for="">Phone - </label>
                    {{ $interview->enrollment->phone }}
                </div>
                <div class="form-group">
                    <label for="">Role - </label>
                    {{ $interview->role->name }}
                </div>
                <div class="form-group">
                    <label for="">Company - </label>
                    {{ $interview->company->name }}
                </div>
                <div class="form-group">
                    <label for="">Enrollment Date - </label>
                    {{ $interview->enrollment->created_at }}
                </div>
                <form action="{{ url('/admin/interview/detail/set-salary/' . $interview->slug) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Set Salary - </label>
                        <span class="text-secondary">
                            @if ($interview->salary)
                                {{ $interview->salary }}
                            @else
                                Not set yet
                            @endif
                        </span>
                        <input type="number" name="salary" id="salary" placeholder="Enter amount"> kyats
                        <a href="#" id="edit">edit</a>
                    </div>
                    {{-- <input type="submit" value="Set" class="btn btn-dark"> --}}
                </form>
                <form class="form-group" action="{{ url('/admin/interview/detail/post-result/' . $interview->slug) }}"
                    method="POST">
                    @csrf
                    <label for="">Stage - </label>
                    <select name="result" id="result">
                        <option value="">Choose</option>
                        <option value="accept">Accept</option>
                        <option value="reject">Reject</option>
                        <option value="pending">Pending</option>
                    </select>
                    <input type="submit" class="btn btn-dark" value="Submit">
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            $('#result').select2();
        })

        const salaryInput = document.getElementById('salary');
        const editBtn = document.getElementById('edit');

        salaryInput.style.display = 'none';
        let stage = true

        editBtn.addEventListener('click', () => {
            stage = !stage;
            console.log(stage);
            if (stage == false) {
                salaryInput.style.display = 'inline-block';
                editBtn.innerHTML = 'done';
                // stage = true;
            } else {
                salaryInput.style.display = 'none';
                editBtn.innerHTML = 'edit';
                // stage = false;
            }
        });
    </script>
@endsection
