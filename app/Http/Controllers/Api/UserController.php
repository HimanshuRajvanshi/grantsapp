<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Edujugon\PushNotification\PushNotification;



use App\AppUser;
use App\AddCom;
use App\Grants;
use App\AppFavGrant;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            // if ($request->route('method') != 'sendSMS') {
                $this->middleware('auth:api');
            // }
            return $next($request);
        });
    }


public $successStatus = 200;

    //For Login users
    public function login(Request $request)
    {
        if($request->socaillogin){
            $rules = [
                'email'    =>'required|email',
            ];
        }else{
            $rules = [
                'email'       =>'required|email',
                'password'    =>'required',
            ];
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['message' => $validator->messages(),]);
        } else {
            $user = AppUser::where('email',$request->email)->first();
            if($user) {
                if($request->socaillogin){
                    // $login = AppUser::where('email',$request->email);
                        if($request->n_token){
                            //for save notification token
                            $user->n_token=$request->n_token;
                            $user->save();
                        }

                    //get this user record
                    $data['users_details'] = $user;
                    $data['token'] =  $user->createToken('GrantApp')-> accessToken;
                    return response()->json(['success' => $data], $this-> successStatus);
                }else{
                    if(password_verify($request->password, $user->password) ) {
                        $postArray = $user->createToken('GrantsApp')-> accessToken;;
                        $login = AppUser::where('email',$request->email);

                        if($login) {
                            if($request->n_token){
                                //for save notification token
                                $user->n_token=$request->n_token;
                                $user->save();
                            }
                            //get this user record
                            $data['users_details'] = $user;
                            $data['token'] =  $user->createToken('GrantApp')-> accessToken;
                            return response()->json(['success' => $data], $this-> successStatus);
                        }
                    }else {
                        return response()->json(['message' => 'Invalid Password'],401);
                    }
                }
            } else {
             return response()->json(['message' => 'User not found'],401);
            }
        }
    }


    //For Reginter user
    public function register(Request $request)
    {
        if($request->socialsignup){
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
            ]);
        }else{
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
                'c_password' => 'required|same:password',
            ]);
        }

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $email=AppUser::where('email',$request->email)->first();
        if($email){
            $data['success'] =  'error';
            $data['message'] =  'This Email Already Used';
            return response()->json(['data'=>$data], $this-> successStatus);

        }else{
            $input = $request->all();
            if(!$request->socialsignup){
                $input['password'] = bcrypt($input['password']);
            }

            $input['signup_dt'] =date('Y-m-d H:i:s');
            $user = AppUser::create($input);
            $data['token'] =  $user->createToken('GrantsApp')-> accessToken;
            $data['users_details'] = AppUser::where('email',$request->email)->first();
            $data['success'] =  'success';
            return response()->json(['data'=>$data], $this-> successStatus);
        }
    }

    /*
    *Edit users Details
    */
    public function editUser(Request $request, $userId)
    {
        $user = AppUser::find($userId);
        if($user) {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                //'city'    => 'required',
                //'state'   => 'required',
                //'country' => 'required',
            ]);

            if ($validator->fails()) {
                   return response()->json(['error'=>$validator->errors()], 401);
            }

            $input = $request->all();
            $user->fill($input)->save();
            $data['success'] =  'success';
            $data['message'] =  'Profile Updated Successfull';
            $data['user_details']=$user;

            return response()->json(['data'=>$data]);
        }
        return response()->json(['message' => 'User not found!'], 404);
    }

    public function bookmarkgrant(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'grant_id' => 'required',
        ]);

        if ($validator->fails()) {
               return response()->json(['error'=>$validator->errors()], 401);
        }
        $AppFavGrant=AppFavGrant::where('user_id',$request->user_id)->where('grant_id',$request->grant_id)->first();
        if($AppFavGrant){
            $data['errot'] =  'error';
            $data['message'] =  'This Grant Already Favourite.';
            return response()->json(['data'=>$data], $this-> successStatus);
        }else{
            $input = $request->all();
            $input['fav_dt'] =date('Y-m-d H:i:s');
            $user = AppFavGrant::create($input);
            $data['success'] =  'success';
            // $data['success'] =  'Add';
            return response()->json(['data'=>$data], $this-> successStatus);
        }

    }


    public function listbookmark(Request $request, $userId)
    {
        $all_fav=AppFavGrant::where('user_id',$userId)->with('getGrants')->get();
        $data['success'] =  'success';
        $data['all_fav'] =  $all_fav;
        return response()->json(['data'=>$data], $this-> successStatus);
    }


    public function editUserType(Request $request,$userId)
    {
        $validator = Validator::make($request->all(), [
            'user_type' => 'required',
        ]);

        if ($validator->fails()) {
               return response()->json(['error'=>$validator->errors()], 401);
        }

        $user = AppUser::find($userId);
        if($user){
            $user->type=$request->user_type;
            $user->save();

            $data['success'] =  'success';
            $data['message'] =  'Profile Updated Successfull';
            $data['user_details']=$user;

            return response()->json(['data'=>$data]);
        }
    }

    public function notification()
    {
        $app_users=AppUser::select('n_token')->where('type','paid')->get();
        // return $app_user;
        if($app_users){
            $lengthval=count($app_users);

            // for($i=0; $i<=$lengthval;$i++){

            foreach($app_users as $app_user){
             $push = new PushNotification('fcm');
             $push->setMessage([
                 'notification' => [
                         'title'=>'A new Grant has been created!',
                         'body'=> 'Go and check this grant before it expires.',
                         'sound' => 'default'
                         ],
                 'data' => [
                         'extraPayLoad1' => 'value1',
                         'extraPayLoad2' => 'value2'
                         ]
                 ])
              ->setApiKey('AAAAKzxQCL8:APA91bFzq8mwVT9vdI8amUx_kth74Sd_2KX3jtrkfCpY8zpD75IgcRLEPHhOmp_Stq-yzcIHAoxxD-sUgeHBxSMlAjZPLYsuwqdoMlblgX6x1wD3BMq5_HwZ2fg8IRgZbvuM0b81xhzR')
              ->setDevicesToken([$app_user->n_token])
              ->send()
              ->getFeedback();

                    // return 'success';
                //  }
           }
    }

        //      $data['success'] =  'success';
        //       $data['message'] =  'Message send Sucessfull';
        //  return response()->json(['data'=>$data]);
    }


}
