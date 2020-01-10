<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

use \App\Http\Controllers\Service\AdminService as adminService;
use \App\Http\Controllers\Service\BlogService as blogService;
use \App\Http\Controllers\Service\UserService as userService;
use \App\Http\Controllers\Service\CommentService as commentService;


use Illuminate\Http\Request;



class AdminContrller extends Controller
{

    public function index()
    {
        $adminService = new adminService();
        $blogService = new blogService();
        $userService = new userService();
        $commentService = new commentService();
    
        $adminService->abort_admin(auth()->id());

        $user_count = $userService->get_count();
        $blogs = $blogService->get_assoc();
        $comment_count = $commentService->get_count();


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
    
        $adminService->abort_admin(auth()->id());

        
        $users = $userService->get_all();
        
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
    
        $adminService->abort_admin(auth()->id());


        $blogs = $blogService->get_all();

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
    
        $adminService->abort_admin(auth()->id());

        $comments = $commentService->get_all();

        return view('/admin/blog/comment', [
            'comments' => $comments
        ]);
    }

    public function user_delete(Request $request)
    {
        $adminService = new adminService();
        $blogService = new blogService();
        $userService = new userService();
        $commentService = new commentService();
    
        $userService->delete_by_id($request->select_id);

        return back();
    }

    public function blog_delete(Request $request)
    {
        $adminService = new adminService();
        $blogService = new blogService();
        $userService = new userService();
        $commentService = new commentService();
    
        $blogService->delete_by_id($request->select_id);

        return back();
    }

    public function comment_delete(Request $request)
    {
        $adminService = new adminService();
        $blogService = new blogService();
        $userService = new userService();
        $commentService = new commentService();
    
        $commentService->delete_by_id($request->select_id);

        return back();
    }


}
