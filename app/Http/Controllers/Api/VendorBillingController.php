<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\VendorBillingService;
use Illuminate\Support\Facades\View;
use App\Vendor;
use App\VendorBilling;
use App\BillingCategory;

class VendorBillingController extends ApiController {
    /*
     * Vendor
     */

    public function vendor($id = null) {
        $data = (new VendorBillingService)->vendor($id);
        $this->setResponseData($data);
        return $this->respond();
    }

    public function createVendor(Request $request) {
        $data = (new VendorBillingService)->createVendor($request);
        if ($data['errors'] != null) {
            $this->setErrorMessage($data['errors']);
            return $this->respond();
        }
        $this->setResponseData($data);
        return $this->respond();
    }

    public function deleteVendor(Request $request) {
        $data = (new VendorBillingService)->deleteVendor($request);
        $this->setResponseData($data);
        return $this->respond();
    }

    /*
     * Bill Category
     */

    public function billingCategory($id = null) {
        $data = (new VendorBillingService)->billingCategory($id);
        $this->setResponseData($data);
        return $this->respond();
    }

    public function createBillingCategory(Request $request) {
        $data = (new VendorBillingService)->createBillingCategory($request);
        
        
        if ($data['errors'] != null) {
            $this->setErrorMessage($data['errors']);
            return $this->respond();
        }
        $this->setResponseData($data);
        return $this->respond();
    }

    public function deleteBillingCategory(Request $request) {
        $data = (new VendorBillingService)->deleteBillingCategory($request);
        $this->setResponseData($data);
        return $this->respond();
    }
    
     /*
     * Bill Sub-Category
     */

    public function billingSubCategory($id = null) {
        $data = (new VendorBillingService)->billingSubCategory($id);
        $this->setResponseData($data);
        return $this->respond();
    }

    public function createBillingSubCategory(Request $request) {
        $data = (new VendorBillingService)->createBillingSubCategory($request);
        
        
        if ($data['errors'] != null) {
            $this->setErrorMessage($data['errors']);
            return $this->respond();
        }
        $this->setResponseData($data);
        return $this->respond();
    }

    public function deleteBillingSubCategory(Request $request) {
        $data = (new VendorBillingService)->deleteBillingSubCategory($request);
        $this->setResponseData($data);
        return $this->respond();
    }

    /*
     * Vendor Billing
     */

    public function vendorBilling($id = null) {
        $data = (new VendorBillingService)->vendorBilling($id);
        $this->setResponseData($data);
        return $this->respond();
    }

    public function createVendorBilling(Request $request) {
        $data = (new VendorBillingService)->createVendorBilling($request);
        if ($data['errors'] != null) {
            $this->setErrorMessage($data['errors']);
            return $this->respond();
        }
        $this->setResponseData($data);
        return $this->respond();
    }

    public function deleteVendorBIlling(Request $request) {
        $data = (new VendorBillingService)->deleteVendorBilling($request);
        $this->setResponseData($data);
        return $this->respond();
    }

}
