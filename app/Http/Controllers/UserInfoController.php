<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    public function reach(Request $request)
    {
        $user = User::find ( $request->userid );
        return response ( $user );
    }

    public function edit(Request $request)
    {
        $user = User::find ( $request->userid );
        $user->name = $request->name;
        $user->surname = $request->surname;
        if ($user->save ()) {
            return response ( array("status" => "edited") );
        }
    }
}
