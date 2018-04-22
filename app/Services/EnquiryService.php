<?php

namespace App\Services;

use Validator;
use App\Enquiry;

class EnquiryService {

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function createEnquiry($request) {
        $messges = [];
        $validator = Validator::make($request->all(), [
                    'title' => 'required',
                    'message' => 'required'
                        ], [
                    'title.required' => 'Title is required.',
                    'message.required' => 'Message is required.',
                        ]
        );

        if ($validator->fails()) {
            foreach ($validator->errors()->getMessages() as $key => $value) {
                $messges[] = $value[0];
            }
            return ['result' => false, 'message' => implode("<br>", $messges)];
        }


        //$Enquiry = ($request->input('id') > 0  ) ? Enquiry::find($request->input('id')) : new Enquiry;

        $Enquiry = new Enquiry;
        $Enquiry->title = $request->input('title');
        $Enquiry->message = $request->input('message');
        $Enquiry->category_id = $request->input('category_id');
        $Enquiry->status = 1;
        $Enquiry->created_at = date("Y-m-d H:i:s");

        if ($request->input('id') > 0) {

            $Enquiry->reply_user_id = $request->input('reply_user_id');
            $Enquiry->status = 1;
            $Enquiry->created_at = date("Y-m-d H:i:s");
            $Enquiry->save();
            return ['result' => true, 'message' => 'Enquiry replied successfully'];
        } else {
            $Enquiry->user_id = $request->input('user_id');
            $Enquiry->p_id = 0;
            $Enquiry->status = 1;
            $Enquiry->created_at = date("Y-m-d H:i:s");
            $Enquiry->save();
            return ['result' => true, 'message' => 'Enquiry added successfully'];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
}
