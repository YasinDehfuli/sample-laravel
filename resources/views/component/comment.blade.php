<div class="alert alert-comment">
    <b>
        {{$comment->name}}
    </b>
    :
    {{$comment->text}}
    <i>
        {{$comment->created_at->diffForHumans()}}
    </i>
    @foreach($comment->children as $comment)
        @include('component.comment',['comment' => $comment])
    @endforeach
    <hr>
    <div class="btn btn-outline-dark reply"  data-id="{{$comment->id}}">
        Reply
    </div>
</div>
