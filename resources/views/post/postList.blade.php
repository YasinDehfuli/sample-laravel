@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>
            Posts
            <a href="{{route('post.create')}}" class="btn btn-success float-start">
                New Post
            </a>
        </h1>
        @include('component.err')
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>
                    #
                </th>
                <th>
                    {{__("title")}}
                </th>
                <th>
                    {{__("Image")}}
                </th>
                <th>
                    {{__("Date")}}
                </th>
                <th>
                    -
                </th>
            </tr>
            @foreach($posts as $post)
                <tr>
                    <td>
                        {{$post->id}}
                    </td>
                    <td>
                        {{$post->title}}
                    </td>
                    <td>
                        <img src="{{$post->imgUrl()}}"  height="48" alt="211">
                    </td>
                    <td>
                        {{$post->updated_at->diffForHumans()}}
                    </td>
                    <td>
                        <a href="{{route('post.delete',$post->slug)}}" class="btn btn-danger ms-2">
                            &times;
                        </a>
                        <a href="{{route('post.edit',$post->slug)}}" class="btn btn-secondary">
                            Edit
                        </a>
                        &nbsp;
                        <a href="{{route('post.show',$post->slug)}}" class="btn btn-success">
                            view
                        </a>
                    </td>
                </tr>
            @endforeach

        </table>

        {{$posts->links()}}
    </div>
@endsection
