<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\VendorBillingService;
use Illuminate\Support\Facades\View;
use App\Vendor;
use App\VendorBIlling;

class VendorBIllingController extends ApiController {

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
