<?php

namespace App\Services;

use App\ArticleTopic;

class ArticleService {

    public function getArticleTopics() {
        return ArticleTopic::get()->toArray();
    }

}
