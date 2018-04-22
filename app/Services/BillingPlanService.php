<?php

namespace App\Services;

use Validator;
use App\Plans;
use App\Billing;
use App\Client;
use DB;

class BillingPlanService
{

    public function createPlan($request)
    {
        $messges = [];
        $validator = Validator::make($request->all(), [
                    'count' => 'required|max:255|unique:plans,user_count_between,' . $request->input('id'),
                    'amount' => 'required|max:255'
                        ], [
                    'name.required' => 'User Count is required.',
                    'amount.required' => 'Amount is required.',
                        ]
        );

        if ($validator->fails()) {
            foreach ($validator->errors()->getMessages() as $key => $value) {
                $messges[] = $value[0];
            }
            return ['result' => false, 'message' => implode("<br>", $messges)];
        }

        $Plans = ($request->input('id') > 0 ) ? Plans::find($request->input('id')) : new Plans;
        $Plans->user_count_between = $request->input('count');
        $Plans->amount = $request->input('amount');
        $Plans->save();
        if ($request->input('id') > 0) {
            return ['result' => true, 'message' => 'Plan updated successfully'];
        } else {
            return ['result' => true, 'message' => 'Plan added successfully'];
        }
    }

    public function deletePlan($id)
    {
        DB::table('plans')->where('id', '=', $id)->delete();
        return ['result' => true, 'message' => 'Plan Setting deleted successfully'];
    }

    public function plans($id)
    {
        if ($id != null) {
            $roles = DB::table('plans')
                            ->select('plans.id as plan_id', 'plans.user_count_between as count', 'plans.amount as amount')
                            ->where('id', $id)->get();
        } else {
            $roles = DB::table('plans')
                    ->select('plans.id as plan_id', 'plans.user_count_between as count', 'plans.amount as amount')
                    ->get();
        }

        return $roles;
    }

    public function billing($id)
    {
        if ($id != null) {
            $roles = DB::table('billing')
                            ->select('invoice', 'user_count', 'amount', 'bill_between', 'status', 'created_at')
                            ->where('u_id', $id)->get();
        } else {
            $roles = DB::table('billing')
                    ->select('invoice', 'user_count', 'amount', 'bill_between', 'status', 'created_at')
                    ->get();
        }

        return $roles;
    }

}
