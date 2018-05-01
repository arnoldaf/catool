<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class UserArticle extends Model
{
    //
    public function userArticleDocs() {
        return $this->hasMany('App\UserArticleDoc');
    }

    /**
     * To update status of articles
     * @param type $articleId
     * @param type $userId
     * @return bool
     */
    public function updateStatus($articleId, $userId){
        return DB::update("update user_articles set status = 1 where id = ?
and user_id in (select id from users where p_id = ? )", [$articleId, $userId]);
    }

    /**
     * To get articles by userId
     * @param type $userId
     * @param type $recordPerPage
     * @return List of articles
     */
    public function getArticlesByUser($userId, $recordPerPage = 10) {
        return UserArticle::with('userArticleDocs')
                    ->select('user_articles.*', 'article_topics.name as topic_name')
                    ->join('article_topics', 'user_articles.article_topic_id', '=', 'article_topics.id')
                    ->where('user_articles.user_id', $userId)
                    ->orderBy('user_articles.id', 'desc')
                    ->paginate($recordPerPage);  
    }
}
