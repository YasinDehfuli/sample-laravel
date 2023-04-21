<div class="alert alert-comment">
    <img src="https://www.gravatar.com/avatar/{{md5($comment->email)}}?s=128&d=identicon&r=PG" class="mb-2" alt="">
    <b>
        {{$comment->name}}
    </b>

    :
    {{$comment->text}}
    <i>
        {{$comment->created_at->diffForHumans()}} ({{$comment->children()->count()}})
    </i>
    @foreach($comment->children as $comment)
        @include('component.comment',['comment' => $comment])
    @endforeach
    <hr>
    <div class="btn btn-outline-dark reply"  data-id="{{$comment->id}}">
        Reply
    </div>
    @if(auth()->check())
        @if($comment->status == 'PENDING')
            &nbsp;
            <a href="{{route('comment.status',[$comment->id,'REJECT'])}}" class="btn btn-danger">
                Reject
            </a>
            &nbsp;
            <a href="{{route('comment.status',[$comment->id,'ACCEPT'])}}" class="btn btn-success">
                Accept
            </a>
        @else
            &nbsp;
            <a href="{{route('comment.status',[$comment->id,'PENDING'])}}" class="btn btn-warning">
                Pedding
            </a>
        @endif
    @endif
</div>
