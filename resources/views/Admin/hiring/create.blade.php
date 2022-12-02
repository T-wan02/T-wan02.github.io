@extends('Admin.master')

@section('content')
    <div>
        <a href="{{ route('hiring.index') }}" class="btn btn-dark">All Job Posts</a>
    </div>

    <hr>

    <div class="card">
        <div class="card-header">
            <h2>Add Job Post</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('hiring.store') }}" method="POST">
                @csrf

                @if ($errors->any())
                    @foreach ($errors->all() as $e)
                        <div class="alert alert-danger">
                            <span class="">{{ $e }}</span>
                        </div>
                    @endforeach
                @endif

                <div class="form-group d-inline-block me-4">
                    <label for="">Role</label>
                    <select name="role" id="role">
                        @foreach ($role as $r)
                            <option value="{{ $r->slug }}">{{ $r->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group d-inline-block">
                    <label for="">Company</label>
                    <select name="company" id="company">
                        @foreach ($company as $c)
                            <option value="{{ $c->slug }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="">Requirement</label>
                    <textarea name="requirement" id="requirement" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="">Interview Date</label>
                    <input type="date" name="interview_date" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Deadline</label>
                    <input type="date" name="deadline" class="form-control">
                </div>
                <input type="submit" class="ms-auto d-block btn btn-dark" value="Create">
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            $('#role').select2();
            $('#company').select2();

            // $('#requirement').summernote({
            //     callbacks: {
            //         onImageUpload: function(files) {
            //             const frmdata = new FormData();
            //             frmdata.append('image', files[0]);
            //             frmdata.append('_token', '@php echo csrf_token(); @endphp')
            //             $.ajax({
            //                 method: 'POST',
            //                 url: '/admin/product-upload',
            //                 contentType: false,
            //                 processData: false,
            //                 data: frmdata,
            //                 success: function(data) {
            //                     // console.log(data);
            //                     $('#description').summernote('insertImage', data, function(
            //                         $image) {
            //                         $image.css('width', $image.width() / 3);
            //                         $image.attr('data-filename', 'retriever');
            //                         $image.attr('href', data);
            //                     });
            //                 }
            //             })
            //         }
            //     }
            // });
            $('#requirement').summernote();
        })
    </script>
@endsection
