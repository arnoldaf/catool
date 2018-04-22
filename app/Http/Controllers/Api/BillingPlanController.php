<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\BillingPlanService;
use Illuminate\Support\Facades\View;

//use App\Plans;
//use App\Billing;

class BillingPlanController extends ApiController
{

    public function plans($id = null)
    {
        $data = (new BillingPlanService)->plans($id);
        return response()->json($data);
    }

    public function createPlan(Request $request)
    {
        $data = (new BillingPlanService)->createPlan($request);
        return response()->json($data);
    }

    public function deletePlan($id = null)
    {
        $data = (new BillingPlanService)->deletePlan($id);
        return response()->json($data);
    }

    public function billing($id = null)
    {
        $data = (new BillingPlanService)->billing($id);
        return response()->json($data);
    }

}
