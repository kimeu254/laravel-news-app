@extends('layouts.app')

@section('content')
<div>
    <div class="container">
        <div class="py-3">
            <h6 style="color: gray; font-size: x-small;">News <small>/</small> SouthEastern</h6>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div>
                    <h1 style="font-weight: bolder;">{{$southeastern->headline}}</h1>
                </div>
                <div class="d-flex">
                    @foreach($authors as $author)
                    <div>
                        @if($author->id == $southeastern->posted_by)
                        <a class="headline" href="{{route('author.show',$author->first_name)}}" style="font-weight: 700; font-size:x-small">Author: {{$author->first_name}} {{$author->last_name}} </a> 
                        @endif
                    </div>
                    @endforeach
                    <div class="px-2">
                        <small style="font-weight:100; font-size: xx-small;">{{ \Carbon\Carbon::parse($southeastern->created_at)->toRfc850String()}}</small>
                    </div>
                </div>                                          
                <div class="py-3">
                    <div class="con">
                        <img src="/storage/posts/{{$southeastern->image}}" class="img-fluid w-100" style="height: 500px;">
                    </div>
                </div>
                <div class="py-3">
                    <p class="h6" style="white-space: pre-wrap;">{{$southeastern->story}}</p>
                </div>
                <div class="py-3">
                    <div class="con">
                        <img src="/storage/posts/{{$southeastern->image_one}}" class="img-fluid w-100" style="height: 500px;">
                    </div>
                </div>
                <div class="py-3">
                    <p class="h6" style="white-space: pre-wrap;">{{$southeastern->story_one}}</p>
                </div>
                @if ($southeastern->url != null)
                    <div class="py-3">
                        <div class="embed-responsive ratio ratio-16x9">
                            <iframe src="https://www.youtube.com/embed/{{$southeastern->url}}" frameborder="0"></iframe>
                        </div>
                    </div>
                 @endif
                 @if ($southeastern->story_two != null)
                    <div class="py-3">
                        <p class="h6" style="white-space: pre-wrap;">{{$southeastern->story_two}}</p>
                    </div>
                @endif
                <div class="py-3">
                    <h6 style="font-weight: bold;">Share:</h6>
                    <div class="">
                        
                            <a class="fa fa-facebook"></a>
                        
                        
                            <a class="fa fa-instagram"></a>
                        
                        
                            <a class="fa fa-twitter"></a>
                        
                        
                            <a class="fa fa-whatsapp"></a>
    
                    </div>
                </div>
                <div>
                    <h5 style="font-weight: bold;">Related Stories</h5>
                    <div class="row">
                        @foreach($southnews as $news)
                        <div class="col-md-4" >
                            <div style="background: white;">
                                <div class="con">
                                    <img src="/storage/posts/{{$news->image}}" class="img-fluid w-100" style="height: 150px;">
                                </div>
                                <a href="{{route('southeastern.show',$news->headline)}}" class="h4 headline">
                                    <p class="p-2 h6">{{$news->headline}}</p>
                                </a>
                            </div>
                        </div>
                        @endforeach  
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</div>

<style>
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