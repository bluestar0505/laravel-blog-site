<?php


namespace App\Http\Service;


use \App\Models\User;


class UserService 
{
    
    public function getCount()
    {
        return User::all()->count();
    }
    
    public function getAll()
    {
        return User::all();
    }

    public function deleteById($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }

    public function getType($id)
    {
        return User::where('id', $id)->first()->user_type;
    }
}
