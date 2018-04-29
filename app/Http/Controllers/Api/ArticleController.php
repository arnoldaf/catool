<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\ArticleService;

class ArticleController extends ApiController
{
    /**
     * To get master data of topics
     * @return JSON
     */
    public function getArticleTopics() {
        $topics = (new ArticleService)->getArticleTopics();
        $this->setResponseData($topics);
        
        return $this->respond();
    }
    
    /**
     * To store intern articles
     * @param Request $request
     * @return JSON
     */
    public function saveArticles(Request $request) {
        //to validate data 
        $requiredFields = ['title' => 'required',
            'spentHrs' => 'required' ];
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
    
    /**
     * To get intern users articles
     * @return JSON
     */
    public function getArticles ($userId = null) {
        $data = (new ArticleService)->getUserArticle($userId);
        $this->setResponseData($data);
        
        return $this->respond();
    }
    
    /**
     * To get intern users list
     * @return JSON
     */
    public function getInternUsers() {
        $data = (new ArticleService)->getInternUsers();
        if (!$data['result']) {
            $this->setErrorMessage([$data['key'] => $data['message']]);
            return $this->respond(402);
        }
        $this->setResponseData($data['data']);
        
        return $this->respond();
    }
    
    /**
     * To delete user's article which is in pending status
     * @param type $id
     * @return JSON
     */
    public function delete($id) {
        if (!(new ArticleService)->articleDelete($id)) {
            $this->setErrorMessage(['error' => 'record not found']);
            
            return $this->respond(HTTP_STATUS_NOT_FOUND);
        }
        $this->setResponseData();
        
        return $this->respond(HTTP_STATUS_OK);
    }
    
    /**
     * To update status of article
     * @param type $id
     * @return JSON
     */
    public function updateStatus($id) {
        if (!(new ArticleService)->articleStatusUpdate($id)) {
            $this->setErrorMessage(['error' => 'record not found']);
            
            return $this->respond(HTTP_STATUS_NOT_FOUND);
        }
        $this->setResponseData();
        
        return $this->respond(HTTP_STATUS_OK);
    }
    
}
