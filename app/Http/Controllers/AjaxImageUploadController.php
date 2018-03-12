<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\AjaxImage;

class AjaxImageUploadController extends Controller {

    /**
     * Show the application ajaxImageUpload.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxImageUpload() {
        
        return view('ajaxImageUpload');
    }

    /**
     * Show the application ajaxImageUploadPost.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxImageUploadPost(Request $request) {
        $validator = Validator::make($request->all(), [
                    'document1' => 'sometimes|nullable|mimes:doc,docx,pdf,jpeg,png,jpg,gif,svg|max:2048',
                    'document2' => 'sometimes|nullable|mimes:doc,docx,pdf,jpeg,png,jpg,gif,svg|max:2048',
                    'document3' => 'sometimes|nullable|mimes:doc,docx,pdf,jpeg,png,jpg,gif,svg|max:2048',
         ]);


        if ($validator->passes()) {


            $input = $request->all();
            
           if (!empty( $input['document1'])){
             $input['document1'] = time() . '.' . $request->document1->getClientOriginalExtension();
             $request->document1->move(public_path('image'), $input['document1']);
             AjaxImage::create(array('title' => 'Testing 1', 'image' => $input['document1']));
           }
           if (!empty( $input['document2'])){
             $input['document2'] = time() . '.' . $request->document2->getClientOriginalExtension();
             $request->document2->move(public_path('image'), $input['document2']);
             AjaxImage::create($input);
           }
           if (!empty( $input['document3'])){
             $input['document3'] = time() . '.' . $request->document3->getClientOriginalExtension();
             $request->document3->move(public_path('image'), $input['document3']);
             AjaxImage::create($input);
           }
            return response()->json(['success' => 'done']);
        }


        return response()->json(['error' => $validator->errors()->all()]);
    }

}
