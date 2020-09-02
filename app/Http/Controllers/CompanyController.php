<?php

namespace App\Http\Controllers;

use App\AddCom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Handle the incoming request.ss
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

	 public function index()
      {
          $contacts = AddCom::all();
           // print_r($contacts);

        return view('companies_list', compact('contacts'));
      }

    public function store(Request $request)
    {
		$contact = new AddCom;
        $contact->name =  $request->get('name');
		$contact->description =  "";
		$contact->website =  "";
		$contact->is_active =  $request->get('isactive');
		$contact->created_ip =   \Request::ip();

		 $contact->save();
		/* $users = \DB::table('admin')->get();
		print_r($users); */
		 return redirect('/companies_list')->with('success', 'Company Created Successfully!');//
    }

	public function edit($id)
    {
        $contact = AddCom::find($id);
	    return view('edit_comp', compact('contact'));
    }

	 public function update(Request $request, $id)
    {

        $contact = AddCom::find($id);
        $contact->name =  $request->get('name');
		$contact->description =  "";
		$contact->website =  "";
		$contact->is_active =  $request->get('isactive');
		$contact->created_ip =   \Request::ip();

		$contact->update();


        return redirect('/companies_list')->with('success', 'Company updated Successfully!');
    }
	public function destroy($id)
    {
        $contact = AddCom::find($id);
        $contact->delete();

        return redirect('/companies_list')->with('success', 'Company deleted!');
    }

}
