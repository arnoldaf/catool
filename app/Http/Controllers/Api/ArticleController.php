<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\ArticleService;

class ArticleController extends ApiController
{
    //
    public function getArticleTopics() {
        $topics = (new ArticleService)->getArticleTopics();
        $this->setResponseData($topics);
        
        return $this->respond();
    }
}
