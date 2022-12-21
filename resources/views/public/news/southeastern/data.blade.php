<div class="row">
    @foreach($southeastern as $news)
        <div class="col-md-6">
            <div class="con">
                <img src="/storage/posts/{{$news->image}}" alt="" class="img-fluid w-100" style="height: 250px; object-fit: cover;">
            </div>
            <div class="py-3">
                <a href="{{route('southeastern.show',$news->headline)}}" class="headline h5" style="">
                    {{ $news->headline }}
                </a>
                <div class="d-flex">
                    @foreach($authors as $author)
                    <div>
                        @if($author->id == $news->posted_by)
                        <a class="headline" href="{{route('author.show',$author->first_name)}}" style="font-weight: 700; font-size:x-small">Author: {{$author->first_name}} {{$author->last_name}} </a> 
                        @endif
                    </div>
                    @endforeach
                    <div class="px-2">
                        <small style="font-weight:100; font-size: xx-small;">{{ \Carbon\Carbon::parse($news->created_at)->toRfc850String()}}</small>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>