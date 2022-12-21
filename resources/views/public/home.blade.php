@extends('layouts.app')

@section('content')
<div>
    <div class="container">
        <div class="news red full-width">
            <span>Today's Highlights</span>
            <ul class="scrollLeft">
                @foreach($highlights as $news)
                <li>
                    <a href="{{route('southeastern.show',$news->headline)}}" >
                        {{$news->headline}}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 padding-1 rel" style="">
                <div class="con">
                    <img src="/storage/posts/{{$southlate->image}}" alt="" class="img-fluid w-100" style="height: 400px; filter: brightness(60%);">
                </div>
                <div class="top-left-head" style="">SouthEastern</div>
                <a href="{{route('southeastern.show',$southlate->headline)}}" class="top-cat-head h5" style="">{{$southlate->headline}}</a>
            </div>
            <div class="col-md-4 padding-1">
                <div class="row pb-2">
                    <div class="col-md-12 rel" style="">
                        <div class="con">
                            <img src="/storage/posts/{{$nationallate->image}}" alt="" class="img-fluid w-100" style="height: 200px; filter: brightness(60%);">
                        </div>
                        <div class="top-left" style="">National</div>
                        <a href="{{route('national.show',$nationallate->headline)}}" class="top-cat-headline h6" style="">{{$nationallate->headline}}</a>
                    </div>
                </div>
                <div class="row g-1">
                    @foreach($southskip as $news)
                    <div class="col-md-6 rel" style="">
                        <div class="con">
                            <img src="/storage/posts/{{$news->image}}" alt="" class="img-fluid w-100" style="height: 192px; filter: brightness(60%);">
                        </div>
                        <div class="top-left" style="">SouthEastern</div>
                        <a href="{{route('southeastern.show',$news->headline)}}" class="top-cat-headline h6" style="">{{$news->headline}}</a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4 padding-1 rel" style="">
                <div class="con">
                    <img src="/storage/posts/{{$internationallate->image}}" alt="" class="img-fluid w-100" style="height: 400px; filter: brightness(60%);">
                </div>
                <div class="top-left-head" style="">International</div>
                <a href="{{route('international.show',$internationallate->headline)}}" class="top-cat-head h5" style="">{{$internationallate->headline}}</a>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="row pb-5">
                <div class="pb-3">
                    <div class="title px-2">Latest News</div>
                </div>
                <div class="col-lg-6 carousel-col pb-3">
                    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4" aria-label="Slide 5"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="5" aria-label="Slide 6"></button>
                        </div>
                        <div class="carousel-inner">
                            @foreach($carousel as $news)
                            <div class="carousel-item active" data-bs-interval="2000">
                                <img src="/storage/posts/{{$news->image}}" class="img-fluid rounded d-block w-100" alt="..." style="height: 400px; object-fit:cover;">
                                <div class="carousel-caption d-none d-md-block" style="color: white; text-align:start;">
                                    <a href="{{route('southeastern.show',$news->headline)}}" class="headline h2 text-light" style="text-decoration: none; background: rgb(0, 0, 0); background: rgba(0, 0, 0, 0.5);">
                                        {{$news->headline}}
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-md-6 padding-0 rel">
                            <div class="con">
                                <img src="/storage/posts/{{$latestpolitics->image}}" class="img-fluid w-100 top-cat" alt="..." style="">
                            </div>
                            <div class="top-left">Politics</div>
                            <a href="{{route('national.show',$latestpolitics->headline)}}" class="top-cat-headline h5" style="">{{$latestpolitics->headline}}</a>
                        </div>
                        <div class="col-md-6 padding-0 rel">
                            <div class="con">
                                <img src="/storage/posts/{{$latestbusiness->image}}" class="img-fluid w-100 top-cat" alt="..." style="">
                            </div>
                            <div class="top-left">Business</div>
                            <a href="{{route('national.show',$latestbusiness->headline)}}" class="top-cat-headline h5" style="">{{$latestbusiness->headline}}</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 padding-0 rel">
                            <div class="con">
                                <img  src="/storage/posts/{{$latestsports->image}}" class="img-fluid w-100 top-cat" alt="..." style="">
                            </div>
                            <div class="top-left">Sports</div>
                            <a href="{{route('national.show',$latestsports->headline)}}" class="top-cat-headline h5" style="">{{$latestsports->headline}}</a>
                        </div>
                        <div class="col-md-6 padding-0 rel">
                            <div class="con">
                                <img src="/storage/posts/{{$latestlifestyle->image}}" class="img-fluid w-100 top-cat" alt="..." style="">
                            </div>
                            <div class="top-left">Lifestyle</div>
                            <a href="{{route('national.show',$latestlifestyle->headline)}}" class="top-cat-headline h5" style="">{{$latestlifestyle->headline}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="title">Politics</div>
            <div class="col-md-6">
                <div>
                    <div class="con">
                        <img src="/storage/posts/{{$latestpolitics->image}}" alt="" class="img-fluid w-100" style="height: 380px;">
                    </div>
                    <div class="py-4">
                        <a href="{{route('national.show',$latestpolitics->headline)}}" class="headline h1" style="text-decoration: none;">
                            {{$latestpolitics->headline}}
                        </a>
                        <p class="pt-3">
                            {{ \Illuminate\Support\Str::limit ($latestpolitics->story, 200, $end='...')}}
                        </p>
                        <a href="{{route('national.show',$latestpolitics->headline)}}" class="headline h5 p-1" style="text-decoration: none; border: 1px solid #dcdcdc;">
                            Read Article
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row pb-5">
                    @foreach($politics as $news)
                    <div class="col-md-6">
                        <div>
                            <div class="con">
                                <img src="/storage/posts/{{$news->image}}" alt="" class="img-fluid w-100" style="object-fit: cover; height: 160px;">
                            </div>
                            <div class="py-4">
                                <a href="{{route('national.show',$news->headline)}}" class="headline h5" style="text-decoration: none;">
                                    {{$news->headline}}
                                </a>
                                <p class="pt-1">{{ \Illuminate\Support\Str::limit ($news->story, 70, $end='...')}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row pb-5">
            <div class="title">Business</div>
            @foreach($business as $news)
            <div class="col-md-3">
                <div>
                    <div class="con">
                        <img src="/storage/posts/{{$news->image}}" alt="" class="img-fluid w-100" style="object-fit: cover; height: 200px;">
                    </div>
                    <div class="py-4">
                        <a href="{{route('national.show',$news->headline)}}" class="headline h5" style="text-decoration: none;">
                            {{$news->headline}}
                        </a>
                        <p class="pt-2">{{ \Illuminate\Support\Str::limit ($news->story, 70, $end='...')}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="title px-2">Sports</div>
                <div class="row">
                    @foreach($sports as $news)
                    <div class="col-md-4">
                        <div>
                            <div class="con">
                                <img src="/storage/posts/{{$news->image}}" alt="" class="img-fluid w-100" style="height: 150px;">
                            </div>
                            <div class="py-3">
                                <a href="{{route('international.show',$news->headline)}}" class="headline" style="text-decoration: none;">
                                    {{$news->headline}}
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4">
                <div class="title px-2">Lifestyle</div>
                @foreach($lifestyle as $news) 
                <div class="d-flex" style="padding-bottom: 20px;">
                    <div class="con">
                        <img src="/storage/posts/{{$news->image}}" alt="" class="img-fluid" style="height: 120px; width: 400px;">
                    </div>
                    <div style="border-top: 1px solid #dcdcdc;">
                        <div class="p-3">
                            <a href="{{route('national.show',$news->headline)}}" class="headline" style="text-decoration: none;">
                                {{$news->headline}}
                            </a>    
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<style scoped>
    /* Extra small devices (phones, 600px and down) */
    @media only screen and (max-width: 600px) {
        .carousel-item img {
            height: 250px;
        }
    }
    /* Small devices (portrait tablets and large phones, 600px and up) */
    @media only screen and (min-width: 600px) {
        .carousel-item img {
            height: 300px;
        }
    }
    /* Medium devices (landscape tablets, 768px and up) */
    @media only screen and (min-width: 768px) {
        .carousel-item img {
            height: 300px;
        }
    }
    /* Large devices (laptops/desktops, 992px and up) */
    @media only screen and (min-width: 992px) {
        .carousel-item img {
            height: 450px;
        }
    }
    /* Extra large devices (large laptops and desktops, 1200px and up) */
    @media only screen and (min-width: 1200px) {
        .carousel-item img {
            height: 450px;
        }
        .carousel-col {
            padding-right: 30px;
        }
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
    }
    .headline:hover{
        color: #ff2942;
    }
    .padding-0{
        padding-right:0;
        padding-left:0;
    }
    .padding-1{
        padding-right:5px;
        padding-left:5px;
    }
    .padding-2{
        padding-left: 3px;
    }
    .carousel-control-prev,
        .carousel-control-next{
            height: 50px;
            width: 50px;
            outline: white;
            background-size: 100%, 100%;
            border-radius: 50%;
            border: 1px solid white;
            background-color: white;
            position: absolute;
            top: 45%;
        }
        .carousel-control-prev-icon { 
            background-image:url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23009be1' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E"); 
            width: 30px;
            height: 48px;
        }
        .carousel-control-next-icon { 
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23009be1' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E");
            width: 30px;
            height: 48px;
        }
        .carousel-indicators [data-bs-target] {
        box-sizing: content-box;
        flex: 0 1 auto;
        width: 10px; /* change width */
        height: 10px; /* change height */
        padding: 0;
        margin-right: 3px;
        margin-left: 3px;
        text-indent: -999px;
        cursor: pointer;
        background-color: #fff;
        background-clip: padding-box;
        border: 0;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
        opacity: .5;
        transition: opacity .6s ease;
        border-radius: 100%; /* add border-radius */
    }
    .carousel-indicators .active {
            background-color: #000000;
        }
    .top-cat {
        height: 200px; filter: blur(1.1px); -webkit-filter: blur(1.1px);
    }
    .top-cat:hover {
        filter: none;
    }
    .top-cat-headline {
        position:absolute; bottom: 0; left: 5%; color: white; font-weight: bold; text-decoration: none;
    }
    .top-cat-head{
        position:absolute; top: 80%; left: 5%; color: #fff; font-weight: bold; text-decoration: none;
    }
    .top-cat-head:hover{
        color: #ff2942    }
    .top-cat-headline:hover {
        color: #ff2942
    }
    .top-left {
        position:absolute; top: 10%; left: 5%; color: white; background: #ff2942; padding: 0px 4px;
    }
    .top-left-head {
        position:absolute; top: 5%; left: 5%; color: white; background: #ff2942; padding: 0px 4px;
    }
    .rel {
        position: relative;
    }
    .news {
      width: 350px;
      height: 30px;
      margin: 20px auto;
      overflow: hidden;
      padding: 3px;
      -webkit-user-select: none
    } 
    .full-width{
        width: 100%;
    }
    .news span {
      float: left;
      color: #fff;
      padding: 6px;
      position: relative;
      top: 1%;
      box-shadow: inset 0 -15px 30px rgba(0,0,0,0.4);
      background: #ff2942;
      font: 16px 'Source Sans Pro', Helvetica, Arial, sans-serif;
      -webkit-font-smoothing: antialiased;
      -webkit-user-select: none;
      cursor: pointer
    }
    .news ul {
      float: left;
      padding-left: 20px;
      animation: ticker 10s cubic-bezier(1, 0, .5, 0) infinite;
      -webkit-user-select: none
    }
    .news ul li {line-height: 30px; list-style: none }
    .news ul li a {
      color: gray;
      text-decoration: none;
      font: 14px Helvetica, Arial, sans-serif;
      -webkit-font-smoothing: antialiased;
      -webkit-user-select: none
    }
    @keyframes ticker {
        0%   {margin-top: 0}
        25%  {margin-top: -30px}
        50%  {margin-top: -60px}
        75%  {margin-top: -90px}
        100% {margin-top: 0}
    }
    .news ul:hover { animation-play-state: paused }
    .news span:hover+ul { animation-play-state: paused }
</style>
@endsection
