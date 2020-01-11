<?php



namespace App\Http\Service;
use \App\Models\Comment;
use \App\Models\User;



use Illuminate\Http\Request;



class CommentService  
{
    
    public function commentStore($blog_id, $user_id)
    {
        request()->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        $values = request(['title', 'body']);
        $user_id = auth()->id();
        $data=User::where('id', $user_id)->first()->name;

        $values['auth_name'] = $data;
        $values['blog_id'] = $blog_id;
        $values['auth_id'] = $user_id;
        
        $comment = Comment::create($values);

        
    }

    public function delete(Comment $comment)
    {
        $comment->delete();
    }

    public function getByBlogId($blog_id)        
    {
        return Comment::latest()->where('blog_id', $blog_id)->get();
    }


    public function deleteById($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
    }

    public function getCount()
    {
        return Comment::all()->count();
    }

    public function getAll()
    {
        return Comment::all();
    }

}
