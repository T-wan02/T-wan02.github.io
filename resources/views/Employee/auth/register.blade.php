@extends('master')

@section('masterContent')
    <div class="row">
        <div class="col-4 offset-4">
            <div class="card mt-5">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Register Employee</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/employee/post-register/' . $interview->slug) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Profile Image</label>
                            <input type="file" class="form-control" name="profile">
                        </div>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input type="number" name="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea name="address" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Company</label>
                            <input type="text" class="form-control" name="company" value="{{ $company->name }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Role</label>
                            <input type="text" class="form-control" name="role" value="{{ $role->name }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Salary</label>
                            <input type="text" class="form-control" name="salary"
                                value="{{ $interview->salary }} - kyats" readonly>
                        </div>
                        <input type="submit" value="Submit" class="btn btn-primary d-block ms-auto">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
