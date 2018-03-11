<?php

namespace App\Services;

use Validator;
use App\Client;

class ClientService {

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function createClient($request) {
        $messges = [];


        $validator = Validator::make($request->all(), [
                    'first_name' => 'required|max:255',
                    'last_name' => 'required|max:255',
                    'client_code' => 'required|max:100|unique:users,client_code,' . $request->input('id'),
                    'client_email' => 'required|email|max:255|unique:users,email,' . $request->input('id'),
                    'client_mobile' => 'required|max:10|unique:users,mobile,' . $request->input('id'),
                    'url' => 'required|url|max:255|unique:users,url,' . $request->input('id'),
                    'client_password' => 'required|min:6',
                    'confirm_password' => 'required_with:client_password|same:client_password|min:6',
                    'phone' => 'required|max:255',
                    'personal_email' => 'required|max:255',
                    'address' => 'required|max:255',
                    'zipcode' => 'required|max:6',
                    'office_address' => 'required|max:255',
                    'office_phone' => 'required|max:255',
                    'gst_number' => 'required|max:255',
                    'pan_number' => 'required|max:255',
                    'adhar_number' => 'required|max:255',
                    'brand_name' => 'required|max:100|unique:users,brand_name,' . $request->input('id'),
                        ], [
                    'first_name.required' => 'First Name is required.',
                    'last_name.required' => 'Last Name is required.',
                    'client_code.required' => 'Code is required.',
                    'client_email.required' => 'We need to know your e-mail address!',
                    'client_mobile.required' => 'We need to know your mobile!',
                    'url.required' => 'URL is required!',
                    'client_password.required' => 'Password is required!',
                    'confirm_password.required' => 'Confirm Password must be same as password!',
                    'phone.required' => 'Phone is required!',
                    'personal_email.required' => 'Personal Email is required!',
                    'address.required' => 'Address is required!',
                    'zipcode.required' => 'ZIPCODE is required!',
                    'office_address.required' => 'Office Address is required!',
                    'office_phone.required' => 'Office Phone is required!',
                    'gst_number.required' => 'GST Number is required!',
                    'pan_number.required' => 'PAN is required!',
                    'adhar_number.required' => 'Adhar is required!',
                    'brand_name.required' => 'Brand Name is required!',
                        ]
        );

        if ($validator->fails()) {
            foreach ($validator->errors()->getMessages() as $key => $value) {
                $messges[] = $value[0];
            }
            return ['result' => false, 'message' => implode("<br>", $messges)];
        }


        $Client = ($request->input('id') > 0 ) ? Client::find($request->input('id')) : new Client;
        $Client->first_name = $request->input('first_name');
        $Client->middle_name = $request->input('middle_name');
        $Client->last_name = $request->input('last_name');
        $Client->email = $request->input('client_email');
        $Client->password = bcrypt($request->input('client_password'));
        $Client->mobile = $request->input('client_mobile');
        $Client->phone = $request->input('phone');
        $Client->city_name = $request->input('city');
        $Client->state_id = $request->input('state');
        //$Client->country_id  =  $request->input('country_id');
        $Client->zip_code = $request->input('zipcode');
        $Client->personal_email = $request->input('personal_email');
        $Client->brand_name = $request->input('brand_name');
        $Client->user_type_id = $request->input('client_type');
        $Client->role_id = 1;
        $Client->user_type_id = $request->input('plan_type');
        $Client->ip_address = $request->ip();
        $Client->p_id = 0;
        $Client->status = 1;
        $Client->address = $request->input('address');
        $Client->office_address = $request->input('office_address');
        $Client->client_code = $request->input('client_code');
        $Client->office_phone = $request->input('office_phone');
        $Client->gst_number = $request->input('gst_number');
        $Client->pan_number = $request->input('pan_number');
        $Client->adhar_number = $request->input('adhar_number');
        $Client->url = $request->input('url');
        $Client->save();
        if ($request->input('id') > 0) {
            return ['result' => true, 'message' => 'User updated successfully'];
        } else {
            return ['result' => true, 'message' => 'User added successfully'];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getClients($id) {

        if ($id != null) {
            $users = Client::find($id);
        } else {
            //$users = Client::all();
            $users = Client:: where('role_id', '1')->get();
        }
        return ['data' => $users];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function deleteClient($id) {
        // delete
        $client = Client::find($id);
        $client->delete();
        return ['result' => true, 'message' => 'User deleted successfully'];
    }

}
