<?php


namespace App\Http\Controllers\Service;


use \App\Models\User;


class UserService 
{
    
    public function get_count()
    {
        return User::all()->count();
    }
    
    public function get_all()
    {
        return User::all();
    }

    public function delete_by_id($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }

    public function get_type($id)
    {
        return User::where('id', $id)->first()->user_type;
    }
}
