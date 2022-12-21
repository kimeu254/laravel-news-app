@extends('layouts.app')

@section('content')
<div>
    <div class="container">
        <div class="row py-5">
            <div class="col-md-8" id="post-data">
                <div class="title px-2">
                    Posts
                </div>
                <div class="py-4">
                    @include('public.posts.data')
                </div>
                <div class="ajax-load text-center" style="display:none">
                    <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p>
                </div>
            </div>
            <div class="col-md-4"></div>
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
    .hidden {
        display: none;
    }
    .block {
        display: block;
    }
    
</style>
@endsection