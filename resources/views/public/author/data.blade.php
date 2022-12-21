<div class="row py-4">
    @foreach($posts as $news)
    <div class="col-md-3 pb-3">
        <div>
            <div class="con">
                <img src="/storage/posts/{{$news->image}}" alt="" class="img-fluid w-100" style="height: 250px; object-fit: cover;">
            </div>
            <div>
                <a href="{{route('posts.show',$news->headline)}}" class="headline h5" style="">
                    {{$news->headline}}
                </a>
                <div>
                    <div class="px-2">
                        <small style="font-weight:100; font-size: xx-small;">{{ \Carbon\Carbon::parse($news->created_at)->toRfc850String()}}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>