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

}
