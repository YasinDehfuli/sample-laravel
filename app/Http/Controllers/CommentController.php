<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function store(CommentStoreRequest $request){
        $c = new Comment();
        $c->name = $request->name;
        $c->email = $request->email;
        $c->text = $request->text;
        if ($request->has("parent_id") && $request->input("parent_id") != null){
            $c->parent_id = $request->input("parent_id");
        }
        $c->commentable_id = $request->id;
        switch ($request->type){
            case 'post':
                $c->commentable_type = Post::class;
                break;
            case 'user':
                $c->commentable_type = User::class;
                break;
            default:
                $c->commentable_type = Post::class;
        }
        $c->save();
        return redirect()->back()->with(['message' => 'دمت گرم کامنتت اومد']);
    }

    public function updateStatus(Comment $comment,$status){
        if (!auth()->check()){
            return abort(403);
        }
        $comment->status = $status;
        $comment->save();
        return redirect()->back()->with(['message' => 'تایید یا رد شد']);
    }

}
