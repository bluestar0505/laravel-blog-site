<?php


namespace App\Http\Controllers\Service;

use \App\Models\Blog;
use \App\Models\User;



use Illuminate\Http\Request;




class BlogService
{
    public function get_assoc()
    {
        return Blog::latest()->get();
    }

    public function get_all()
    {
        return Blog::all();
    }
    

    public function delete_by_id($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
    }


    public function store($user_id)
    {
        request()->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        $values = request(['title', 'body']);
        $values['user_id'] = $user_id;
        $data=User::where('id', $user_id)->first()->name;
        $values['auth_name'] = $data;
        
        $blog = Blog::create($values);
    }


    public function delete($id)
    {
        $blog = Blog::findOrFail($id);

        $blog->delete();
    }

    public function get_by_id($id)
    {
        $blog = Blog::findOrFail($id);
        return $blog;
    }

    public function update($id, $title, $body)
    {
        $blog = Blog::findOrFail($id);

        $blog->update([
        'title' => $title,
        'body' => $body
        ]);
    }
}



