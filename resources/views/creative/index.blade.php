@extends('layouts.layout-1')
@section('content')
    <div class="change-post">
        <h1>Total creatives</h1>
        <div class="button-wrapper button-wrapper--filter">
            @foreach($types as $type)
                <a class="bth full {{$filter == $type->title ? 'active' : ''}}"
                   href="/creatives/?filter={{urlencode($type->title)}}">{{$type->title}}</a>
            @endforeach
            @foreach($tags as $tag)
                <a class="bth" href="/creatives/?filter_tag={{urlencode($tag->title)}}">{{$tag->title}}</a>
            @endforeach
        </div>
        <div class="card-wrapper">
            @forelse($creatives as $creativ)
                <div class="card-body">
                    <div class="card-body__image" style="background-image: url({{ $creativ["image_thumb"] }});">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAMAAABHPGVmAAAAA1BMVEX///+nxBvIAAAAIUlEQVRoge3BgQAAAADDoPlTX+EAVQEAAAAAAAAAAACPASd0AAGLis+ZAAAAAElFTkSuQmCC">
                    </div>
                    <p class="card-body__title">{{ $creativ["description"] }}</p>
                    <a click="{{$creativ["src"]}}" href="{{ route('creatives.edit', [$creativ["image"]])  }}"
                       class="card-body__button">
                        edit/delete
                    </a>
                </div>
            @empty
                <h2>there is nothing</h2>
            @endforelse
        </div>
        {{$creatives->links()}}
        <script>
            function to() {
                window.location.href = window.location.origin + `/creatives/${event.target.attributes[0].value.split('/')[4]}/edit`
            }
        </script>
    </div>
@endsection
