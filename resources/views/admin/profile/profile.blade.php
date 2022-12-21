@extends('layouts.admin')

@section('content')
<div>
    <div class="container">
      <div class="main-body">
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
    
          <div>
            <div class="row gutters-sm">
              <div class="col-md-4 mb-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                      @if(Auth::user()->profile_image == null)
                      <div>
                          <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                      </div>
                      @else
                      <div>
                          <img src="/storage/profile/{{Auth::user()->profile_image}}" alt="Admin" class="rounded-circle" width="150" style="object-fit: cover;">
                      </div>
                      @endif
                      <div class="mt-3">
                        <h4>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h4>
                        <p class="text-secondary mb-1">Professional Author</p>
                        <p class="text-muted font-size-sm">{{Auth::user()->address}}</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card mt-3">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg> Twitter</h6>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg> Instagram</h6>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg> Facebook</h6>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-8">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Full Name</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        {{Auth::user()->first_name}} {{Auth::user()->last_name}}
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        {{Auth::user()->email}}
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Phone</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        {{Auth::user()->contact}}
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Address</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        {{Auth::user()->address}}
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Stories</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        {{$count}}
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-12">
                        <a href="#edit-profile-{{Auth::user()->id}}" class="btn btn-outline-info btn-large" onclick="edit_profile({{Auth::user()->id}})">Edit</a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row gutters-sm">
                  <div class="col-sm-12 mb-3">
                    <div class="card h-100">
                      <div class="card-body">
                          <h6 class="mb-4" style="font-weight: bold;">Bio</h6>
                          <p class="text-secondary" style="font-size: small;">{{Auth::user()->bio}}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
    </div>
</div>

{{-- Modal --}}
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">New Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" id="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" value="" id="id" name="id"/>
            <input type="hidden" value="{{ Auth::user()->id }}" id="id" name="id"/>
            <div class="form-body">
                <div class="mb-4">
                    <input type="text" name="first_name" class="form-control" placeholder="First Name">
                </div>
                <div class="mb-4">
                    <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                </div>
                <div class="mb-4">
                    <input type="text" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="mb-4">
                    <input type="text" name="contact" class="form-control" placeholder="Phone">
                </div>
                <div class="mb-4">
                    <input type="text" name="address" class="form-control" placeholder="Address">
                </div>
                <div class="mb-4">
                    <textarea name="bio" class="form-control" placeholder="Write Bio here..." style="height: 100px"></textarea>
                </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
</div>

<script type="text/javascript">

    var save_method; //for save method string

    function edit_profile(id)
    {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        //Ajax Load data from ajax
        $.ajax({
            url : "profile/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="id"]').val(data[0].id);
                $('[name="first_name"]').val(data[0].first_name);
                $('[name="last_name"]').val(data[0].last_name);
                $('[name="email"]').val(data[0].email);
                $('[name="contact"]').val(data[0].contact);
                $('[name="address"]').val(data[0].address);
                $('[name="bio"]').val(data[0].bio);
                $('#staticBackdrop').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Profile'); // Set title to Bootstrap modal title
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                // alert('Error get data from ajax');
                new swal({   title: "Error",
                    text: "Error getting data from ajax.",
                    timer: 2500,
                    type: "error",
                    showConfirmButton: false
                });
            }
        });
    }
    function save()
    {
        $('#progress').show();
        var url;
        var id = document.getElementById('id').value;
            url = "profile/" + id;
            t = "PUT";
        // ajax adding data to database
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : url,
            type: t,
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data) {
                window.location.reload();
                //if success close modal and reload ajax table
                $('#progress').hide();
                $('#staticBackdrop').modal('hide');
                new swal({   
                    icon: 'success',
                    text: "Profile Updated successfully.",
                    timer: 2500,
                    type: "success",
                    showConfirmButton: false
                });
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                // alert('Error adding / update data');
                new swal({   title: "Error",
                    text: "Error adding / updating data.",
                    // timer: 1000,
                    type: "error",
                    showConfirmButton: true
                });
            }
        });
    }
   
</script>


<style>
    .card {
        box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
    }
    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0,0,0,.125);
        border-radius: .25rem;
    }
    .card-body {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1rem;
    }
    .gutters-sm {
        margin-right: -8px;
        margin-left: -8px;
    }
    .gutters-sm>.col, .gutters-sm>[class*=col-] {
        padding-right: 8px;
        padding-left: 8px;
    }
    .mb-3, .my-3 {
        margin-bottom: 1rem!important;
    }
    .bg-gray-300 {
        background-color: #e2e8f0;
    }
    .h-100 {
        height: 100%!important;
    }
    .shadow-none {
        box-shadow: none!important;
    }
   
</style>
@endsection