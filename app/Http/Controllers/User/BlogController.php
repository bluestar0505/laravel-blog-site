<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use \App\Http\Controllers\Service\BlogService as blogService;
use \App\Http\Controllers\Service\UserService as userService;
use \App\Http\Controllers\Service\CommentService as commentService;

class BlogController extends Controller
{
    


    public function index()
    {
        $blogService = new blogService();
        $userService = new userService();
        $commentService = new commentService();
    
    
        $blogs = $blogService->get_assoc();
        $user_type = $userService->get_type(auth()->id());

        return view('/user/blog/index', [
            'blogs' => $blogs,
            'user_type' => $user_type
        ]);
    }


    public function create()
    {
        $userService = new userService();
    
        $user_type = $userService->get_type(auth()->id());

        $this->abortUser($user_type);

        return view('/user/blog/create', [
            'user_type' => $user_type
        ]);
    }

    public function store()
    {
        $blogService = new blogService();
        $userService = new userService();
        
    
        $blogService->store(auth()->id());

        $user_type = $userService->get_type(auth()->id());

        return redirect()->route('blogs');
    }

    public function show($blog)
    {
        $blogService = new blogService();
        $userService = new userService();
        $commentService = new commentService();

        $blogs = $blogService->get_by_id($blog);
    
        $comments = $commentService->get_by_blog_id($blogs->id);
        $user_type = $userService->get_type(auth()->id());

        return view('/user/blog/show', [
            'blog'=>$blogs,
            'comments' => $comments,
            'user_type' => $user_type
        ]);
    }

    public function edit($blog)
    {
        $blogService = new blogService();
        $userService = new userService();

        
        $blogs = $blogService->get_by_id($blog);
    
        $user_type = $userService->get_type(auth()->id());

        $this->abortUser($user_type);

        return view('user/blog/edit', [
            'blog'=>$blogs,
            'user_type' => $user_type
        ]);
    }


    public function update($blog, Request $request)
    {
        $blogService = new blogService();


        $blogService->update($blog,  $request->title, $request->body);


        return back();
    }

    public function delete($blog)
    {
        $blogService = new blogService();
        
    
        $blogService->delete($blog);
        

        return redirect()->route('blogs');
    }

    private function abortUser($user_type)
    {
        if($user_type == 'comment')
        {
            abort(403);
        }
    }
}
