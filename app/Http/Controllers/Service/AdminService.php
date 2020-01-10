<?php


namespace App\Http\Controllers\Service;

use \App\Models\User;


class AdminService
{
    public function abort_admin($user_id)
    {
        
        $user_type = User::where('id', $user_id)->first()->user_type;
        
        if($user_type != "admin")
        {
            abort(403);
        }
    }

}
