<?php

namespace App\Http\Controllers\User;
use \App\Http\Service\CommentService as commentService;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    

    public function store($blog_id)
    {
        $commentService = new commentService();
    

        $commentService->commentStore($blog_id, auth()->id());

        return redirect()->route('show-blog', ['blog' => $blog_id]);
    }

    public function delete($comment_id)
    {
        $commentService = new commentService();
    
        $commentService->delete($comment_id);

        return back();
    }
}
