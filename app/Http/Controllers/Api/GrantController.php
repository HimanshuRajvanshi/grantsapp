<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\AppUser;
use App\AddCom;
use App\Grants;
use Illuminate\Support\Facades\Auth;
use Validator;



class GrantController extends Controller
{
    public $successStatus = 200;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            // if ($request->route('method') != 'sendSMS') {
                $this->middleware('auth:api');
            // }
            return $next($request);
        });
    }


    public function listGrant(Request $request)
    {
        $grants_list = Grants::get();
        $data['success'] =  'success';
        $data['grants_list'] =  $grants_list;
        return response()->json(['data'=>$data], $this-> successStatus);
    }




}
