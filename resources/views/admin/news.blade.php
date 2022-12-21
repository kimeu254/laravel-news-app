@extends('layouts.admin')

@section('content')
<style>
    #progress {
        display: none;
        color: green;
    }
</style>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <div class="row py-5">
                <div class="col-sm-12">
                    <h4 class="page-title">News</h4>
                </div>
            </div>

            <table id="table" class="table table-striped table-hover table-condensed yajra-datatable">
                <thead class="thead-default">
                    <tr>
                        <th>Headline</th>
                        <th>Region</th>
                        <th>Category</th>
                        <th>Story</th>
                        <th>Created At</th>
                        <th style="width:125px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Modal --}}
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Post News</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" id="addNews" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" value="" id="id" name="id"/>
            <input type="hidden" value="{{ Auth::user()->id }}" id="id" name="id"/>
            <div class="form-body">
                <div class="mb-4">
                    <input type="text" name="headline" id="headline" class="form-control" placeholder="Headline" required>
                </div>
                <div class="mb-4">
                    <label for="region_id" class="">Region</label>
                    <select class="form-select" name="region_id" id="region_id">
                        <option value=""></option>
                        @foreach($regions as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="category_id" class="">Category</label>
                    <select class="form-select" name="category_id" id="category_id">
                        <option value=""></option>
                        @foreach($categories as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <h6>Part 1</h6>
                </div>
                <div class="mb-4">
                    <input type="file" name="image" accept="image/*" class="form-control-file" id="file">
                </div>
                <div class="mb-4">
                    <img id="preview" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif" alt="" style="max-height: 250px;">
                </div>
                <div class="mb-4">
                    <textarea name="story" id="story" class="form-control" placeholder="Type your story here..." style="height: 100px" required></textarea>
                </div>
                <div>
                    <h6>Part 2</h6>
                </div>
                <div class="mb-4">
                    <input type="file" name="image_one" id="image_one" accept="image/*" class="form-control-file">
                </div>
                <div class="mb-4">
                    <img id="preview-one" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif" alt="" style="max-height: 250px;">
                </div>
                <div class="mb-4">
                    <textarea name="story_one" id="story_one" class="form-control" placeholder="Type your story here..." style="height: 100px"></textarea>
                </div>
                <div>
                    <h6>Part 3</h6>
                </div>
                <div class="mb-4">
                    <input type="text" name="url" id="url" class="form-control" placeholder="YouTube URL">
                </div>
                <div class="mb-4">
                    <div class="embed-responsive ratio ratio-16x9">
                        <iframe id="iframe" src="https://www.youtube.com/embed/tgbNymZ7vqY" frameborder="0"></iframe>
                    </div>
                </div>
                <div class="mb-4">
                    <textarea name="story_two" id="story_two" class="form-control" placeholder="Type your story here..." style="height: 100px"></textarea>
                </div>
            </div>
            <div id="progress">Please wait...</div>
          </form>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" onclick="save()">Save</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
</div>

{{-- Filter Modal --}}
<div class="modal fade" id="modal_filter" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Filter News</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="filter_form" class="form-horizontal">
                    <div class="form-body">
                        
                        <div class="mb-4">
                            <label for="filter_region" class="">Region</label>
                            <select class="form-select" name="filter_region" id="filter_region">
                                <option value=""></option>
                                @foreach($regions as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="filter_category" class="">Category</label>
                            <select class="form-select" name="filter_category" id="filter_category">
                                <option value=""></option>
                                @foreach($categories as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="submit" id="btnFilter"  class="btn btn-primary">Filter</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">

    var save_method; //for save method string
    var table;
    $(document).ready(function() {
        table = $('#table').DataTable({
            processing: true,
            serverSide: true,
            order: [ [5, 'desc'] ],
            dom: 'Bfrtip',
            ajax: '{{ route('list-news') }}',
            columns: [
                { data: 'headline', name: 'headline' },
                { data: 'name', name: 'name' },
                { data: 'slug', name: 'slug' },
                { data: 'story', name: 'story' },
                { 
                    data: 'created_at',
                    type: 'num',
                },
                { data: "action" }
            ],
            buttons: [
                    'pageLength',
                    {
                        text: 'Post News',
                        action: function (e, dt, node, config) {
                            add_news();
                        },
                    },

                    {
                        text: 'Filter Data <span class="fa fa-filter"></span>',
                        action: function (e, dt, node, config) {
                           filter_data();
                        }
                    }
                ],
        });
    });

    $("#filter_form").on('submit', function(event) {
        event.preventDefault()
        $('#modal_filter').modal('hide');
        let url= "{{ route('list-news') }}"
        let table = $('#table').DataTable();
        url+="?"+$("#filter_form").serialize()
        // table.destroy();
        table.ajax.url(url).load()
    });

    function filter_data(){
        $('#modal_filter').modal('show');
    }
    
    function add_news()
    {
        save_method = 'add';
        $('#addNews')[0].reset(); // reset form on modals
        $('#preview').attr('src', "https://www.riobeauty.co.uk/images/product_image_not_found.gif");
        $('#preview-one').attr('src', "https://www.riobeauty.co.uk/images/product_image_not_found.gif");
        $('#staticBackdrop').modal('show'); // show bootstrap modal
        $('.modal-title').text('Post News'); // Set Title to Bootstrap modal title
    }

    function edit_news(id)
    {
        save_method = 'update';
        $('#addNews')[0].reset(); // reset form on modals
        //Ajax Load data from ajax
        $.ajax({
            url : "news/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                var img = data[0].image
                var img_one = data[0].image_one
                var url = data[0].url

                $('[name="id"]').val(data[0].id);
                $('[name="headline"]').val(data[0].headline);
                $('[name="story"]').val(data[0].story);
                $('[name="category_id"]').val(data[0].category_id);
                $('[name="region_id"]').val(data[0].region_id);
                $('[name="story_one"]').val(data[0].story_one);
                $('[name="url"]').val(data[0].url);
                $('[name="story_two"]').val(data[0].story_two);
                $('#preview').attr('src', "/storage/posts/" + img);
                $('#preview-one').attr('src', "/storage/posts/" + img_one);
                $('#iframe').attr('src', "https://www.youtube.com/embed/" + url);
                $('#staticBackdrop').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit News'); // Set title to Bootstrap modal title
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

    function reload_table()
    {
        table.ajax.reload(null,false); //reload datatable ajax
    }
    function save()
    {
        $('#progress').show();
        if(save_method == 'add')
        {
            var headline = $('#headline').val();
            var story = $('#story').val();
            var story_one = $('#story_one').val();
            var url = $('#url').val();
            var story_two = $('#story_two').val();
            var category_id = $('#category_id').val();
            var region_id = $('#region_id').val();
            var formData = new FormData();

            formData.append('image', image);
            formData.append('image_one', image_one);
            formData.append('headline', headline);
            formData.append('region_id', region_id);
            formData.append('category_id', category_id);
            formData.append('story', story);
            formData.append('story_one', story_one);
            formData.append('url', url);
            formData.append('story_two', story_two);

            $.ajax({
                cache: false,
                contentType: false,
                processData: false,
                type: 'post',
                data: formData,
                url: "{{ route('add-news') }}",
                success: function(data) {
                    reload_table();
                    //if success close modal and reload ajax table
                    $('#progress').hide();
                    $('#staticBackdrop').modal('hide');
                    new swal({   
                        icon: 'success',
                        text: "News Added successfully.",
                        timer: 2500,
                        type: "success",
                        showConfirmButton: false
                    });
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    // alert('Error adding / update data');
                    new swal({   title: "Error",
                        text: "Error adding data.",
                        // timer: 1000,
                        type: "error",
                        showConfirmButton: true
                    });
                }
                // success: function (response) {
                //     $('#staticBackdrop').modal('hide');
                //     if (response.success) {
                //         $('#successMessage').show();
                //         $('#successMessage').text(response.message);
                //     } else {
                //         $('#failedMessage').show();
                //         $('#failedMessage').text(response.message);
                //     }
                //     setTimeout(() => {
                //         location.reload();
                //     }, 2000);
                // }
            });
        }
        else
        {
            var url;
            var id = document.getElementById('id').value;
            url = "news/" + id;
            t = "PUT";

            $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : url,
            type: t,
            data: $('#addNews').serialize(),
            dataType: "JSON",
            success: function(data) {
                reload_table();
                //if success close modal and reload ajax table
                $('#progress').hide();
                $('#staticBackdrop').modal('hide');
                new swal({   
                    icon: 'success',
                    text: "News Updated successfully.",
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
        // ajax adding data to database
        
    }

    $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

    $(document).ready(function (e) {
 
   
        $('#file').change(function(){
                
        let reader = new FileReader();

        reader.onload = (e) => { 

            $('#preview').attr('src', e.target.result); 
        }

        reader.readAsDataURL(this.files[0]); 
        
        });
        
    });

    $(document).ready(function (e) {
 
   
        $('#image_one').change(function(){
                
        let reader = new FileReader();

        reader.onload = (e) => { 

            $('#preview-one').attr('src', e.target.result); 
        }

        reader.readAsDataURL(this.files[0]); 
        
        });
        
    });

        let image;
        let image_one;

        $('#file').change(function (e) {
            image = e.target.files[0];
        })

        $('#image_one').change(function (e) {
            image_one = e.target.files[0];
        })

        $('#addNews').submit(function (e) {
            e.preventDefault();
            var headline = $('#headline').val();
            var story = $('#story').val();
            var story_one = $('#story_one').val();
            var url = $('#url').val();
            var story_two = $('#story_two').val();
            var category_id = $('#category_id').val();
            var region_id = $('#region_id').val();
            var formData = new FormData();

            formData.append('image', image);
            formData.append('image_one', image_one);
            formData.append('headline', headline);
            formData.append('region_id', region_id);
            formData.append('category_id', category_id);
            formData.append('story', story);
            formData.append('story_one', story_one);
            formData.append('url', url);
            formData.append('story_two', story_two);

            $.ajax({
                cache: false,
                contentType: false,
                processData: false,
                type: 'post',
                data: formData,
                url: "{{ route('add-news') }}",
                success: function (response) {
                    $('#staticBackdrop').modal('hide');
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

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function delete_appdata(id){
            new swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            })
            .then((response) => {
                if (response.isConfirmed) {
                    $.ajax({
                        url : "{{ url('news')}}" + '/' + id,
                        type : "POST",
                        data : {'_method' : 'DELETE'},
                        success: function(data){
                            new swal({
                                title: 'Deleted!',
                                text: 'Your file has been deleted.',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            reload_table();
                        },
                        error : function(){
                            new swal({
                                title: 'Opps...',
                                text : data.message,
                                type : 'error',
                                timer : '1500'
                            })
                        }
                    })
                } else if (response.dismiss === Swal.DismissReason.cancel){
                    new swal({
                            title: 'Canceled',
                            text: 'Your imaginary file is safe :)',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 1500
                    });
                }
            });
        }

</script>


@endsection