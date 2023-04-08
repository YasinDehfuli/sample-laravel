@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>
            {{$post->title}}
        </h1>
        <img height="100" src="{{$post->imgUrl()}}" alt="">
        <p class="usual-text">
            {{$post->body}}
        </p>
        <div>
            @foreach($post->comments as $comment)
                @include('component.comment',['comment' => $comment])
            @endforeach
        </div>
        <a href="{{route('cat.show',$post->category->slug)}}">
            {{$post->category->title}}
        </a>
        @include('component.err')
        <form action="{{route('comment.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="name">
                            {{__('Name')}}
                        </label>
                        <input type="text" id="name" name="name" value="{{old('name')}}" placeholder="{{__('Name')}}" class="form-control">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="email">
                            {{__('Email')}}
                        </label>
                        <input type="email" id="email" name="email" value="{{old('email')}}" placeholder="{{__('Email')}}" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="message">
                    {{__('Comment')}}
                </label>
                <textarea name="text"  placeholder="{{__('Comment')}}" id="message"
                          class="form-control" cols="30" rows="4">{{old('text')}}</textarea>
            </div>
            <input type="hidden" name="type" value="post" >
            <input type="hidden" name="id" value="{{$post->id}}" >
            <input type="hidden" id="parent" name="parent_id" value="">
            <button class="btn btn-primary mt-3">
                {{__("Send Comment")}}
            </button>
        </form>
    </div>
@endsection
