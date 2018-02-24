<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Validator;
use App\AjaxImage;


class AjaxImageUploadController extends Controller
{
	/**
     * Show the application ajaxImageUpload.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxImageUpload()
    {
    	return view('ajaxImageUpload');
    }


    /**
     * Show the application ajaxImageUploadPost.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxImageUploadPost(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'document1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'document2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'document3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ],[
                    'document1.required' => 'Rent Agrrement is required.',
                    'document2.required' => 'Form 16 is required.',
			'document3.required' => 'Medical Bill is required.',
                        ]);


      if ($validator->passes()) {


        $input = $request->all();
        $input['document1'] = time().'.'.$request->document1->getClientOriginalExtension();
        $request->document1->move(public_path('image'), $input['document1']);
        
        AjaxImage::create(array('title'=> 'Testing 1', 'image'=> $input['document1']));

        $input['document2'] = time().'.'.$request->document2->getClientOriginalExtension();
        $request->document2->move(public_path('image'), $input['document2']);
        //AjaxImage::create($input);

        $input['document3'] = time().'.'.$request->document3->getClientOriginalExtension();
        $request->document3->move(public_path('image'), $input['document3']);
        //AjaxImage::create($input);

        return response()->json(['success'=>'done']);
      }


      return response()->json(['error'=>$validator->errors()->all()]);
    }
}