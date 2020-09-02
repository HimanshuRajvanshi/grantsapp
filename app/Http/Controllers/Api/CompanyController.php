<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\AppUser;
use App\AddCom;
use Illuminate\Support\Facades\Auth;
use Validator;



class CompanyController extends Controller
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


    public function postCompany(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'is_active'    => 'required',
        ]);
        if ($validator->fails()) {
               return response()->json(['error'=>$validator->errors()], 401);
        }

        if($request->companyId){
            $comanyDetails = AddCom::find($request->companyId);
            $input = $request->all();
            $comanyDetails->fill($input)->save();
            $data['success'] =  'success';
            $data['message'] =  'Company Successfully Updated';
        }else{
            $input = $request->all();
            $user = AddCom::create($input);
            $data['success'] =  'success';
            $data['message'] =  'Company Successfully Created';
        }
        return response()->json(['data'=>$data], $this-> successStatus);

    }

    public function listCompany(Request $request)
    {
        $company_lists = AddCom::get();
        return response()->json(['data'=>$company_lists]);
    }

    // public function deleteCompany($id)
    // {
    //     echo "sdfdfdfdfd";
    //     $contact = AddCom::find($id);
    //     if($contact){
    //         echo "aaa";
    //         $contact->delete();

    //         $data['success'] =  'success';
    //         $data['message'] =  'Company Successfully Deleted';
    //         return response()->json(['data'=>$data], $this-> successStatus);
    //     }
    //     echo "33333";
    //     return response()->json(['data'=>'Data Not Found']);
    // }

}
