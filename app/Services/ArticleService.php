<?php

namespace App\Services;

use App\ArticleTopic;
use App\UserArticle;
use App\UserArticleDoc;
use App\Services\UploadFileService;

class ArticleService {

    public function getArticleTopics() {
        return ArticleTopic::get()->toArray();
    }
    
    public function saveArticles($request) {
        try {
            
            $article = new UserArticle();
            //if otherTopic is not null then need to create this article
            $article->article_topic_id = $request['articleTopicId'];
            if ($request['otherTopic'] != null ) {
                //to find this topic already exist or need to create 
                $existTopic = (new ArticleTopic)->getByName($request['otherTopic']);
                if ($existTopic) {
                    $article->article_topic_id = $existTopic->id;
                } else {
                    //to save new one topic and get its Id
                    $articleTopic = new ArticleTopic;
                    $articleTopic->name = $request['otherTopic'];
                    $articleTopic->save();
                    $article->article_topic_id = $articleTopic->id;
                }
            }
            $article->user_id = $request['userId'];
            $article->title = $request['title'];
            $article->description = $request['description'];
            $article->spent_hrs = $request['spentHrs'];
            $article->save();
            // if save then need to save file 
            if ($request['file']) {
                $uploads = (new UploadFileService)->upload($request['file']);
                $toBeSaveDocs = [];
                if (!empty($upload)) {
                    foreach ($uploads as $key => $upload ) {
                        $toBeSaveDocs[$key] = [
                            'user_article_id' => $article->id,
                            'doc_name' => $upload['fileName'],
                            'doc_path' => $upload['filePath'],
                            'doc_type' => $upload['fileType']
                        ];
                    }
                    UserArticleDoc::insert($toBeSaveDocs);
                }
            }
        } catch (Exception $e) {
            return false;
        }
        
        return $article;
    }

}
