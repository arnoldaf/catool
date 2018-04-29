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
}
