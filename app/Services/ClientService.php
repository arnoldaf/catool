<?php

namespace App\Services;
use Validator;
use Auth;
use App\User;
use App\Client;

class ClientService
{
    public function createClient($request) {
		$post_data = $request->all();
		$messges   = [];
		$validator = Validator::make($request->all(),
            [
				'first_name'            => 'required|max:255',
                'client_email'          => 'required|email|max:255|unique:users,email',
				'url'                   => 'required',
                'client_password'       => 'required|min:6|max:20',
                'client_code'       	=> 'required|max:255',
				'client_mobile'         => 'required',
				'phone'          		=> 'required',
            ],
            [
                'name.required'         => 'Name is required.',
                'client_email.required' => 'We need to know your e-mail address!',
            ]
        );
		
        if ($validator->fails()) {
			foreach ($validator->errors()->getMessages() as $key => $value) {
				$messges[] = $value[0] ;
			}
			return ['result'=>false,'message'=>implode("<br>",$messges)];
        }
		
		$user = Client::create([
            'first_name'       => $request->input('first_name'),
			'middle_name'      => $request->input('middle_name'),
			'last_name'        => $request->input('last_name'),
            'email'            => $request->input('client_email'),
            'password'         => bcrypt($request->input('client_password')),
			'mobile'           => $request->input('client_mobile'),
			'phone'            => $request->input('phone'),
			'city_name'        => $request->input('city'),
			'state_id'         => $request->input('state'),
			'country_id'       => $request->input('country_id'),
			'zip_code'         => $request->input('zipcode'),
			'personal_email'   => $request->input('personal_email'),
			'brand_name'       => $request->input('brand_name'),
			'user_type_id'     => $request->input('client_type'),
			'role_id'          => $request->input('role_id'),
			'user_type_id'     => $request->input('plan_type'),
            'ip_address' 	   => $request->ip(),
            'status'           => 1,
			'address'		   => $request->input('address'),
			'office_address'   => $request->input('office_address'),
			'client_code'	   => $request->input('client_code'),
			'office_phone'	   => $request->input('office_phone'),
			'gst_number'	   => $request->input('gst_number'),
			'pan_number'	   => $request->input('pan_number'),
			'adhar_number'	   => $request->input('adhar_number'),
			'url'		       => $request->input('url'),
        ]);
        $user->save();
		return ['result'=>true,'message'=>'User added successfully'];
		
    }
}
