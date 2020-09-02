<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\User;

class userController extends BaseController
{
	 public function __construct()
     {
        $this->middleware('auth');
     }

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function userList(Request $request)
    {
        $users_list = User::whereNOTIn('id',[1])->where('type','free')->get();
    //    return $users_list;
        return view("users",compact('users_list'));
    }


}
