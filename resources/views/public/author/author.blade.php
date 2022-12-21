@extends('layouts.app')

@section('content')
<style>
    .ajax-load{
  		background: #e1e1e1;
		padding: 10px 0px;
		width: 100%;
  	}
    .con {
      overflow: hidden;
    }
    .con img {
        object-fit: cover;
        display: block;
        transition: transform .4s;
    }
    .con img:hover {
        transform: scale(1.3);
        transform-origin: 50% 50%;
    }
    .title{
        font-weight: 900; 
        font-size: 30px;
        color: rgb(40, 116, 119);
        border: 1px solid #e7dee9;
        border-left: 5px solid #ff2942;
        margin-bottom: 10px;
    }
    .headline{
        font-weight:700;
        color: black;
        text-decoration: none;
    }
    .headline:hover{
        color: #ff2942;
    }
    .bg-black {
      background: #000;
    }
    .skill-block {
      width: 40%;
    }
    @media (min-width: 991px) and (max-width:1200px) {
      .skill-block {
        padding: 32px !important;
      }
    }
    @media (min-width: 1200px) {
      .skill-block {
        padding: 56px !important;
      }
    }
    </style>
<div>
    <div class="container mt-5 mb-5">
        <div class="row no-gutters pb-5">
            <div class="col-md-4 col-lg-4"><img src="https://bootdey.com/img/Content/avatar/avatar7.png"></div>
            <div class="col-md-8 col-lg-8">
                <div class="d-flex flex-column">
                    <div class="d-flex flex-row justify-content-between align-items-center p-5 bg-dark text-white">
                        <h3 class="display-5">{{$first_name->first_name}} {{$first_name->last_name}}</h3>
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-whatsapp"></i>
                        <i class="fa fa-linkedin"></i>
                    </div>
                    <div class="p-3 bg-black text-white">
                        <h5>Bio</h5>
                        <div>
                            <p style="font-weight:lighter; font-size:small white-space: pre-wrap;">{{$first_name->bio}}</p>
                        </div>
                    </div>
                    <div class="d-flex flex-row text-white">
                        <div class="p-3 bg-primary text-center skill-block">
                            <h4>Email</h4>
                            <h6>{{$first_name->email}}</h6>
                        </div>
                        <div class="p-3 bg-success text-center skill-block">
                            <h4>Phone</h4>
                            <h6>{{$first_name->contact}}</h6>
                        </div>
                        <div class="p-3 bg-warning text-center skill-block">
                            <h4>Stories</h4>
                            <h6>{{$count}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            <div class="title px-2">
                Stories
            </div>
            <div class="">
                @include('public.author.data')
            </div>
            <div class="ajax-load text-center" style="display:none">
                <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var page = 1;
	$(window).scroll(function() {
	    if($(window).scrollTop() + $(window).height() >= $(document).height()) {
	        page++;
	        loadMoreData(page);
	    }
	});


	function loadMoreData(page){
	  $.ajax(
	        {
	            url: '?page=' + page,
	            type: "get",
	            beforeSend: function()
	            {
	                $('.ajax-load').show();
	            }
	        })
	        .done(function(data)
	        {
	            if(data.html == " "){
	                $('.ajax-load').html("No more records found");
	                return;
	            }
	            $('.ajax-load').hide();
	            $("#post-data").append(data.html);
	        })
	        .fail(function(jqXHR, ajaxOptions, thrownError)
	        {
	              alert('server not responding...');
	        });
	}
</script>
@endsection