<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\VendorBillingService;

class VendorBIllingController extends ApiController
{

    public function vendor($id = null)
    {
        $data = (new VendorBillingService)->vendor($id);
        //return response()->json($data);
        $this->setResponseData($data);
        
        return $this->respond();
    }

    public function createVendor(Request $request)
    {
        $data = (new VendorBillingService)->createVendor($request);
        if (!$data['result']) {
            $this->setErrorMessage($data['message']);
            
            return $this->respond(HTTP_STATUS_BAD_REQUEST);
        }
        $this->setResponseData($data);
        
        return $this->respond();
    }

    public function deleteVendor($id = null)
    {
        $data = (new VendorBillingService)->deleteVendor($id);
        return response()->json($data);
    }
    
    
    public function vendorBilling($id = null)
    {
        $data = (new VendorBillingService)->vendorBIlling($id);
        return response()->json($data);
    }

    public function createVendorBilling(Request $request)
    {
        $data = (new VendorBillingService)->createVendorBIlling($request);
        return response()->json($data);
    }

    public function deleteVendorBIlling($id = null)
    {
        $data = (new VendorBillingService)->deleteVendorBilling($id);
        return response()->json($data);
    }
    
    

}