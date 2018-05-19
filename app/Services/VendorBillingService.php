<?php

namespace App\Services;

use Validator;
use App\Vendor;
use App\VendorBilling;
use App\BillingCategory;
use App\BillingSubCategory;
use DB;
use Tymon\JWTAuth\Facades\JWTAuth;

ini_set('memory_limit', '160M');

class VendorBillingService {

    public function createVendor($request) {

        $messges = [];
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:255|unique:vendor,name,' . $request->input('id'),
                    'gst_number' => 'required|max:255'
                        ], [
                    'name.required' => 'Vendor name is required.',
                    'gst_number.required' => 'Vendor GST Number is required.',
                        ]
        );

        if ($validator->fails()) {
            foreach ($validator->errors()->getMessages() as $key => $value) {
                $messges[$key] = $value[0];
            }
            return ['errors' => $messges];
        }

        $Vendor = ($request->input('id') > 0 ) ? Vendor::find($request->input('id')) : new Vendor;

        $Vendor->p_id = getCurrentUser()->id;
        $Vendor->name = $request->input('name');
        $Vendor->gst_number = $request->input('gst_number');
        $Vendor->save();
        return ['data' > $Vendor->toArray(), 'errors' => ''];
    }

    public function createBillingCategory($request) {

        $messges = [];
        $validator = Validator::make($request->all(), [
                    'category_name' => 'required|max:255|unique:billing_category,category_name,' . $request->input('id')
                        ], [
                    'category_name.required' => 'Category name is required.'
                        ]
        );

        if ($validator->fails()) {
            foreach ($validator->errors()->getMessages() as $key => $value) {
                $messges[$key] = $value[0];
            }
            return ['errors' => $messges];
        }

        $BillCategory = ($request->input('id') > 0 ) ? BillingCategory::find($request->input('id')) : new BillingCategory;

        $BillCategory->u_id = getCurrentUser()->id;
        $BillCategory->category_name = $request->input('category_name');
        $BillCategory->save();
        return ['data' > $BillCategory->toArray(), 'errors' => ''];
    }

    public function createBillingSubCategory($request) {

        $messges = [];
        $validator = Validator::make($request->all(), [
                    'category_id' => 'required',
                    'sub_category_name' => 'required|max:255|unique:billing_sub_category,sub_category_name,' . $request->input('id')
                        ], [
                    'category_id.required' => 'Category name is required.',
                    'category_name.required' => 'Category name is required.'
                        ]
        );

        if ($validator->fails()) {
            foreach ($validator->errors()->getMessages() as $key => $value) {
                $messges[$key] = $value[0];
            }
            return ['errors' => $messges];
        }

        $BillSubCategory = ($request->input('id') > 0 ) ? BillingSubCategory::find($request->input('id')) : new BillingSubCategory;

        //$BillSubCategory->u_id = getCurrentUser()->id;
        $BillSubCategory->category_id = $request->input('category_id');
        $BillSubCategory->sub_category_name = $request->input('sub_category_name');
        $BillSubCategory->save();
        return ['data' > $BillSubCategory->toArray(), 'errors' => ''];
    }

    public function createVendorBilling($request) {
        $messges = [];
        $validator = Validator::make($request->all(), [
                    'category_id' => 'required',
                    'sub_category_id' => 'required',
                    'vendor_id' => 'required',
                    'invoice_date' => 'required',
                    'invoice_number' => 'required',
                    'bill_amount' => 'required',
                    'tds_deduction_status' => 'required'
                        ], [
                    'category_id.required' => 'Bill Category is required.',
                    'sub_category_id.required' => 'Bill Sub Category is required.',
                    'vendor_id.required' => 'Vendor is required.',
                    'invoice_date.required' => 'Invoice Date is required.',
                    'invoice_number.required' => 'Invoice Number required.',
                    'bill_amount.required' => 'Bill Amount is required.',
                    'tds_deduction_status.required' => 'TDS Deduction Status is required.',
                        ]
        );

        if ($request->input('tds_deduction_status') == 1) {
            $validator = Validator::make($request->all(), [
                        'tds_amount' => 'required',
                        'payable_amount' => 'required',
                        'payable_date' => 'required',
                            ], [
                        'tds_amount.required' => 'TDS Amount is required.',
                        'payable_amount.required' => 'Payable Amount is required.',
                        'payable_date.required' => 'Payable Date is required.',
                            ]
            );
        }

        if ($validator->fails()) {
            foreach ($validator->errors()->getMessages() as $key => $value) {
                $messges[$key] = $value[0];
            }
            return ['errors' => $messges];
        }

        $VendorBilling = ($request->input('id') > 0 ) ? VendorBilling::find($request->input('id')) : new VendorBilling;
        //$VendorBilling = ($request->input('id') > 0 ) ? VendorBilling::find($request->input('id')) : new VendorBilling;
        /* $image = $request->file('bill_file');
          $path = public_path() . '/bills/';
          $filename = time() . '.' . $image->getClientOriginalExtension();
          $image->move($path, $filename);
         * 
         */

        $VendorBilling->category_id = $request->input('category_id');
        $VendorBilling->sub_category_id = $request->input('sub_category_id');
        $VendorBilling->vendor_id = $request->input('vendor_id');
        $VendorBilling->bill_description = $request->input('bill_description');
        $VendorBilling->invoice_date = $request->input('invoice_date');
        $VendorBilling->invoice_number = $request->input('invoice_number');
        $VendorBilling->bill_amount = $request->input('bill_amount');
        $VendorBilling->tds_deduction_status = $request->input('tds_deduction_status');
        $VendorBilling->tds_amount = $request->input('tds_amount');
        $VendorBilling->cgst_amount = $request->input('cgst_amount');
        $VendorBilling->sgst_amount = $request->input('sgst_amount');
        $VendorBilling->igst_amount = $request->input('igst_amount');
        $VendorBilling->payable_amount = $request->input('payable_amount');
        $VendorBilling->payable_date = $request->input('payable_date');
        //$VendorBilling->bill_file = $filename;


        $VendorBilling->save();
        //$Vendor->save();
        return ['data' > $VendorBilling->toArray(), 'errors' => ''];
        /* if ($request->input('id') > 0) {
          return ['result' => true, 'message' => 'Vendor Billing updated successfully'];
          } else {
          return ['result' => true, 'message' => 'Vendor Billing added successfully'];
          }
         * 
         */
    }

    public function deleteVendor($request) {
        $id = $request->input('id');
        // delete
        $vendor = Vendor::find($id);
        $vendor->delete();
        return $vendor->toArray();
    }

    public function deleteVendorBilling($request) {

        $id = $request->input('id');
        // delete
        $vendorBilling = VendorBilling::find($id);
        $vendorBilling->delete();
        return $vendorBilling->toArray();
    }

    public function deleteBillingCategory($request) {

        $id = $request->input('id');
        // delete
        $billingCategory = BillingCategory::find($id);
        $billingCategory->delete();
        return $billingCategory->toArray();
    }

    public function deleteBillingSubCategory($request) {

        $id = $request->input('id');
        // delete
        $billingSubCategory = BillingSubCategory::find($id);
        $billingSubCategory->delete();
        return $billingSubCategory->toArray();
    }

    public function vendor($id) {
        if ($id != null) {
            $users = Vendor::find($id);
        } else {
            $users = Vendor::all();
        }

        return $users->toArray();
    }

    public function vendorBilling($id) {
        if ($id != null) {
            $bills = VendorBilling::find($id);
        } else {
            $bills = VendorBilling::all();
        }
        return $bills->toArray();
    }

    public function billingCategory($id) {
        if ($id != null) {
            $category = BillingCategory::find($id);
        } else {
            $category = BillingCategory::all();
        }
        return $category->toArray();
    }

    public function billingSubCategory($id) {
        if ($id != null) {
            $subCategory = BillingSubCategory::find($id);
        } else {
            $subCategory = BillingSubCategory::all();
        }
        return $subCategory->toArray();
    }

    /**
     * parse Token
     * @return type array
     */
    public function parseToken() {
        return $payload = JWTAuth::parseToken()->getPayload();
    }

}
