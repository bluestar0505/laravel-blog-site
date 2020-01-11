<?php


namespace App\Http\Service;

use \App\Models\User;


class AdminService
{
    public function abortAdmin($user_id)
    {
        
        $user_type = User::where('id', $user_id)->first()->user_type;
        
        if($user_type != "admin")
        {
            abort(403);
        }
    }

}
