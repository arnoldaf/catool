<?php

namespace App\Services;

use Validator;
use App\Vendor;
use App\VendorBilling;
use DB;

class VendorBillingService
{

    public function createVendor($request)
    {
        $messges = [];
        $validator = Validator::make($request->all(), [
                    'p_id' => 'required|max:255',
                    'name' => 'required|max:255|unique:vendor,name,' . $request->input('id'),
                    'gst_number' => 'required|max:255'
                        ], [
                    'p_id.required' => 'Client is required.',
                    'name.required' => 'Vendor name is required.',
                    'gst_number.required' => 'Vendor GST Number is required.',
                        ]
        );

        if ($validator->fails()) {
            foreach ($validator->errors()->getMessages() as $key => $value) {
                $messges[] = $value[0];
            }
            return ['result' => false, 'message' => implode("<br>", $messges)];
        }

        $Vendor = ($request->input('id') > 0 ) ? Vendor::find($request->input('id')) : new Vendor;
        $Vendor->name = $request->input('name');
        $Vendor->p_id = $request->input('p_id');
        $Vendor->gst_number = $request->input('gst_number');
        $Vendor->save();
        if ($request->input('id') > 0) {
            return ['result' => true, 'message' => 'Vendor updated successfully'];
        } else {
            return ['result' => true, 'message' => 'Vendor added successfully'];
        }
    }

    public function createVendorBilling($request)
    {
        $messges = [];
        $validator = Validator::make($request->all(), [
                    'vendor_id' => 'required|max:255',
                    'bill_date' => 'required|max:255',
                    'bill_amount' => 'required|max:255',
                    'gst_amount' => 'required|max:255',
                    'tax_amount' => 'required|max:255'
                        ], [
                    'vendor_id.required' => 'Vendor is required.',
                    'bill_date.required' => 'Bill Date is required.',
                    'bill_amount.required' => 'Bill Amount required.',
                    'gst_amount.required' => 'Bill GST Amount is required.',
                    'tax_amount.required' => 'Bill Tax Amount is required.',
                        ]
        );

        if ($validator->fails()) {
            foreach ($validator->errors()->getMessages() as $key => $value) {
                $messges[] = $value[0];
            }
            return ['result' => false, 'message' => implode("<br>", $messges)];
        }

        $VendorBilling = ($request->input('id') > 0 ) ? VendorBilling::find($request->input('id')) : new VendorBilling;
        $image = $request->file('images');
        $path = public_path() . '/bills/';
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $image->move($path, $filename);

        $VendorBilling->vendor_id = $request->input('vendor_id');
        $VendorBilling->bill_date = $request->input('bill_date');
        $VendorBilling->bill_amount = $request->input('bill_amount');
        $VendorBilling->gst_amount = $request->input('gst_amount');
        $VendorBilling->tax_amount = $request->input('tax_amount');
        $VendorBilling->bill_description = $request->input('bill_description');
        $VendorBilling->bill_file = $filename;


        $VendorBilling->save();
        if ($request->input('id') > 0) {
            return ['result' => true, 'message' => 'Vendor Billing updated successfully'];
        } else {
            return ['result' => true, 'message' => 'Vendor Billing added successfully'];
        }
    }

    public function deleteVendor($id)
    {
        DB::table('vendor')->where('id', '=', $id)->delete();
        return ['result' => true, 'message' => 'Vendor deleted successfully'];
    }

    public function deleteVendorBilling($id)
    {
        DB::table('vendor_billing')->where('id', '=', $id)->delete();
        return ['result' => true, 'message' => 'Vendor Bill deleted successfully'];
    }

    public function vendor($id)
    {
        if ($id != null) {
            return Vendor::find($id)->toArray();   
        } else {
            return Vendor::all()->toArray();
        }
    }

    public function vendorBilling($id)
    {
        if ($id != null) {
            $roles = DB::table('vendor_billing')
                            ->where('id', $id)->get();
        } else {
            $roles = DB::table('vendor_billing')
                    ->get();
        }

        return $roles;
    }

}