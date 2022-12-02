@extends('Employee.index')

@section('data')
    <div class="">
        <div class="mt-4">
            <div class="form-group">
                <label for="">Phone - </label>
                <span>{{ $profile->phone }}</span>
            </div>
            <div class="form-group">
                <label for="">Address - </label>
                <span>{{ $profile->address }}</span>
            </div>
            <div class="form-group">
                <label for="">Email - </label>
                <span>{{ $profile->email }}</span>
            </div>
            <div class="form-group">
                <label for="">Role - </label>
                <span>{{ $profile->role->name }}</span>
            </div>
            <a href="#" id="chgpsbtn">Change Password </a>
            <div class="card mt-3 w-50" id="chgPsForm" style="display: none">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Change password</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/employee/change-password/' . $profile->slug) }}" method="POST"
                        class="change_password_form">
                        @csrf
                        <div class="form-group">
                            <label for="">Enter New Password</label>
                            <input type="password" name="new_password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control">
                        </div>
                        <input type="submit" value="Change" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        //    console.log('hello');
        const chgBtn = document.getElementById('chgpsbtn');
        const chgPsForm = document.getElementById('chgPsForm');
        let isClicked = false;

        chgBtn.addEventListener('click', () => {
            //   chgPsForm.style.display = 'none';

            isClicked = !isClicked;

            console.log(isClicked);

            if (isClicked == true) {
                chgPsForm.style.display = 'block';
            } else {
                chgPsForm.style.display = 'none'
            }
        });
    </script>
@endsection
