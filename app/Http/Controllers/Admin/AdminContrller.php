<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

use \App\Http\Service\AdminService as adminService;
use \App\Http\Service\BlogService as blogService;
use \App\Http\Service\UserService as userService;
use \App\Http\Service\CommentService as commentService;


use Illuminate\Http\Request;



class AdminContrller extends Controller
{

    public function index()
    {
        $adminService = new adminService();
        $blogService = new blogService();
        $userService = new userService();
        $commentService = new commentService();
    
        $adminService->abortAdmin(auth()->id());

        $user_count = $userService->getCount();
        $blogs = $blogService->getAssoc();
        $comment_count = $commentService->getCount();


        return view('/admin/user/index', [
            'user_count'=>$user_count,
            'blogs'=>$blogs,
            'comment_count'=>$comment_count
        ]);
    }


    public function user()
    {
        $adminService = new adminService();
        $blogService = new blogService();
        $userService = new userService();
        $commentService = new commentService();
    
        $adminService->abortAdmin(auth()->id());

        
        $users = $userService->getAll();
        
        return view('/admin/user/user', [
            'users' => $users
        ]);
    }

    public function blog()
    {
        $adminService = new adminService();
        $blogService = new blogService();
        $userService = new userService();
        $commentService = new commentService();
    
        $adminService->abortAdmin(auth()->id());


        $blogs = $blogService->getAll();

        return view('/admin/blog/blog', [
            'blogs' => $blogs
        ]);
    }

    public function comment()
    {
        $adminService = new adminService();
        $blogService = new blogService();
        $userService = new userService();
        $commentService = new commentService();
    
        $adminService->abortAdmin(auth()->id());

        $comments = $commentService->getAll();

        return view('/admin/blog/comment', [
            'comments' => $comments
        ]);
    }

    public function userDelete(Request $request)
    {
        $adminService = new adminService();
        $blogService = new blogService();
        $userService = new userService();
        $commentService = new commentService();
    
        $userService->deleteById($request->select_id);

        return back();
    }

    public function blogDelete(Request $request)
    {
        $adminService = new adminService();
        $blogService = new blogService();
        $userService = new userService();
        $commentService = new commentService();
    
        $blogService->deleteById($request->select_id);

        return back();
    }

    public function commentDelete(Request $request)
    {
        $adminService = new adminService();
        $blogService = new blogService();
        $userService = new userService();
        $commentService = new commentService();
    
        $commentService->deleteById($request->select_id);

        return back();
    }


}
