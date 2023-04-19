@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>
            دسته:
            {{$category->title}}
        </h1>
        <ul class="list-group">
            @foreach($posts as $post)
                <li class="list-group-item">
                    <a href="{{route('post.show',$post->slug)}}">
                        {{$post->title}}
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="p-5">
            {{$posts->links()}}
        </div>
    </div>
@endsection
