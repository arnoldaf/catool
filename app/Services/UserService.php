<?php

namespace App\Services;

use Validator;
use Auth;
use App\User;
use App\Client;

class ClientService {

    public function createClient($request) {
        $post_data = $request->all();
        $messges = [];
        $validator = Validator::make($request->all(), [
                    'first_name' => 'required|max:255',
                    'last_name' => 'required|max:255',
                    'client_email' => 'required|email|max:255|unique:users,email',
                    'url' => 'required|max:255',
                    'password' => 'required|min:6|max:20', 
                    'confirm_password' => 'required_with:password|same:password|min:6',
                    'client_mobile' => 'required|max:20',
                    'phone' => 'required',
                    'personal_email' => 'required|email|max:255|unique:users,personal_email',
                    'city_name' => 'required',
                    'state_id' => 'required',
                    'country_id' => 'required',
                    'zip_code' => 'required',
                    'office_address' => 'required',
                    'office_phone' => 'required',
                    'gst_number' => 'required',
                    'pan_number' => 'required',
                    'adhar_number' => 'required',
                    'brand_name' => 'required',
                        ], [
                    'first_name.required' => 'First Name is required.',
                    'last_name.required' => 'Last Name is required.',
                    'client_email.required' => 'We need to know your e-mail address!',
                    'url.required' => 'URL is required.',
                    'password.required' => 'Password is required.',
                    'confirm_password.required' => 'Confirm Password is required.',
                    'client_mobile' => 'Mobile Number is required.',
                    'phone' => 'Phone Number is required.',
                    'personal_email' => 'Personal Email is required.',
                    'city_name' => 'City Name is required.',
                    'state_id' => 'State is required.',
                    'country_id' => 'Country is required.',
                    'zip_code' => 'ZipCode is required.',
                    'office_address' => 'Office Address is required.',
                    'office_phone' => 'Office Phone is required.',
                    'gst_number' => 'GST Number is required.',
                    'pan_number' => 'PAN Number is required.',
                    'adhar_number' => 'Adhar Number is required.',
                    'brand_name' => 'Brand Name is required.',
                        ]
        );


        if ($validator->fails()) {
            foreach ($validator->errors()->getMessages() as $key => $value) {
                $messges[] = $value[0];
            }
            return ['result' => false, 'message' => implode("<br>", $messges)];
        }


        $user = Client::create([
                    'first_name' => $request->input('first_name'),
                    'middle_name' => $request->input('middle_name'),
                    'last_name' => $request->input('last_name'),
                    'client_email' => $request->input('email'),
                    'url' => $request->input('url'),
                    'password' => bcrypt($request->input('password')),
                    'confirm_password' => bcrypt($request->input('confirm_password')),
                    'mobile' => $request->input('client_mobile'),
                    'phone' => $request->input('phone'),
                    'city_name' => $request->input('city'),
                    'state_id' => $request->input('state'),
                    'country_id' => $request->input('country_id'),
                    'zip_code' => $request->input('zipcode'),
                    'personal_email' => $request->input('personal_email'),
                    'brand_name' => $request->input('brand_name'),
                    'user_type_id' => $request->input('client_type'),
                    'role_id' => $request->input('role_id'),
                    'user_type_id' => $request->input('plan_type'),
                    'ip_address' => $request->ip(),
                    'status' => 1,
                    'address' => $request->input('address'),
                    'office_address' => $request->input('office_address'),
                    'client_code' => $request->input('client_code'),
                    'office_phone' => $request->input('office_phone'),
                    'gst_number' => $request->input('gst_number'),
                    'pan_number' => $request->input('pan_number'),
                    'adhar_number' => $request->input('adhar_number'),
        ]);


        $user->save();
        return ['result' => true, 'message' => 'User added successfully'];
    }

}
