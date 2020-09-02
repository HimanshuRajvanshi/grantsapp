<?php

namespace App\Http\Controllers;

use App\Grants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Edujugon\PushNotification\PushNotification;
use App\AppUser;

class GrantController extends Controller
{
    /**
     * Handle the incoming request.ss
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

	 public function index()
    {
          $contacts = Grants::all();
           // print_r($contacts);

        return view('grants', compact('contacts'));
    }
    public function store(Request $request)
    {

        $url = $request->get('web_link');

        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return back()->with('error', 'Url is invalid!');
        }

		$contact = new Grants;

        $contact->name = $request->get('name');
		$contact->amount = $request->get('amount');
		$contact->start_date = $request->get('start_date');
		$contact->end_date = $request->get('end_date');
		$contact->elibility_req = $request->get('elibility_req');
		$contact->web_link = "";
        $contact->org_id = "0";
        $contact->web_link = $request->get('web_link');
		$contact->com_name = $request->get('com_name');
	    $contact->is_active =  $request->get('isactive');


		 $contact->save();
		/* $users = \DB::table('admin')->get();
        print_r($users); */

        $app_users=AppUser::select('n_token')->where('type','paid')->get();
        if($app_users){
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
          }
        }

		 return redirect('/grants')->with('success', 'Grants Created Successfully!');//
    }

	public function edit($id)
    {
        $contact = Grants::find($id);

	    return view('edit_grant', compact('contact'));
    }

	 public function update(Request $request, $id)
    {
        $url = $request->get('web_link');

        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return back()->with('error', 'Url is invalid!');
        }

        $contact = Grants::find($id);
        $contact->name = $request->get('name');
		$contact->amount = $request->get('amount');
		$contact->elibility_req = $request->get('elibility_req');
		$contact->start_date = $request->get('start_date');
		$contact->com_name = $request->get('com_name');
		$contact->end_date = $request->get('end_date');
		$contact->is_active =  $request->get('isactive');
        $contact->web_link = $request->get('web_link');

		$contact->update();


        return redirect('/grants')->with('success', 'Grants updated Successfully!');
    }

	public function destroy($id)
    {
        $contact = Grants::find($id);
        $contact->delete();
        return redirect('/grants')->with('success', 'Grants deleted!');

    }

}
