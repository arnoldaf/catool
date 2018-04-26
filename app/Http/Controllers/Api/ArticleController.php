<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\ArticleService;

class ArticleController extends ApiController
{
    //
    public function getArticleTopics() {
        $topics = (new ArticleService)->getArticleTopics();
        $this->setResponseData($topics);
        
        return $this->respond();
    }
    
    public function saveArticles(Request $request) {
        //to validate data 
        $requiredFields = ['title' => 'required',
            'userId' => 'required' ];
        $validate = Validator::make($request->all(), $requiredFields);
        if ($validate->fails()) {
            foreach ($validate->errors()->getMessages() as $key => $value) {
                $messges[$key] = $value[0];
            }
            $this->setErrorMessage($messges);
            
            return $this->respond();
        }
        $data = (new ArticleService)->saveArticles($request->all());
        if ($data) {
            $this->setResponseData($data->toArray());
            
            return $this->respond();
        }
        
    }
}
