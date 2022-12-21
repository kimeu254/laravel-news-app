@extends('layouts.admin')

@section('content')
<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update Picture</div>
                    <div class="card-body">
                        <form action="" method="POST" id="newPic" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ Auth::user()->id }}" id="id" name="id"/>
                            <div class="form-body">
                                <div class="my-4">
                                    <input type="file" name="profile_image" accept="image/*" class="form-control-file" id="file">
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        let profile_image;

        $('#file').change(function (e) {
            profile_image = e.target.files[0];
        })
        $('#newPic').change(function (e) {
            profile_image = e.target.files[0];
            var formData = new FormData();
            formData.append('profile_image', profile_image);
            formData.append('id', id);
            $.ajax({
                cache: false,
                contentType: false,
                processData: false,
                type: 'PUT',
                data: formData,
                url: "{{ route('update-image') }}",
                success: function (response) {
                    if (response.success) {
                        $('#successMessage').show();
                        $('#successMessage').text(response.message);
                    } else {
                        $('#failedMessage').show();
                        $('#failedMessage').text(response.message);
                    }
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                }
            });

        });
</script>
@endsection