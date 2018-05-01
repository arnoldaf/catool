<?php

namespace App\Services;

use App\ArticleTopic;
use App\UserArticle;
use App\UserArticleDoc;
use App\Services\UploadFileService;
use App\User;
use App\Roles;

class ArticleService {
    protected $recordPerPage = null;
    public function __construct() {
        $this->recordPerPage = env('RECORD_PER_PAGE', 10);
    }
    /**
     * To get all master topics
     * @return Array
     */
    public function getArticleTopics() {
        return ArticleTopic::get()->toArray();
    }

    /**
     * To save user's article
     * @param type $request
     * @return boolean|UserArticle
     */
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
            $article->user_id = getCurrentUser()->id;
            $article->title = $request['title'];
            $article->description = $request['description'];
            $article->spent_hrs = $request['spentHrs'];
            $article->save();
            // if save then need to save file
            if (!empty($request['file'])) {
                $uploads = (new UploadFileService)->upload($request['file']);
                $toBeSaveDocs = [];
                if (!empty($uploads)) {
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

    /**
     * To get user's article
     * @return Array
     */
    public function getUserArticle($selectedUserId = null) {
        $articleWithDocs = [];
        if ($selectedUserId != null ) {  // to get articles by userId
            $articles = (new UserArticle)->getArticlesByUser($selectedUserId, $this->recordPerPage);
            if ($articles) {
                $articleWithDocs = $articles->toArray();
            }

            return $articleWithDocs;
        }
        //to get logged in user's Id
        $userId = getCurrentUser()->id;
        // If pId > 0 then need to get articles of only logged in user
        if (getCurrentUser()->p_id > 0 ) {
            $articles = (new UserArticle)->getArticlesByUser($userId, $this->recordPerPage);
        } else { //If pId = 0 then need to get all user's article under this user
            // to get all user's id under this user
            $userIds = User::where('p_id', $userId)->pluck('id');
            $articles = UserArticle::with('userArticleDocs')
                    ->select('user_articles.*', 'article_topics.name as topic_name')
                    ->join('article_topics', 'user_articles.article_topic_id', '=', 'article_topics.id')
                    ->whereIn('user_articles.user_id', $userIds)
                    ->orderBy('user_articles.id', 'desc')
                    ->paginate($this->recordPerPage);
        }
        if ($articles) {
            $articleWithDocs = $articles->toArray();
        }

        return $articleWithDocs;
    }

    /**
     * To get all inters users under ca
     * @return Array
     */
    public function getInternUsers() {
        // to get role of inter user
        $adminId = getCurrentUser()->id;
        $role = (new Roles)->getByName('intern-user');
        if (!$role) {
            return ['result' => false, 'key' => 'role', 'message' => 'role intern does not exist'];
        }
        $users = User::where(['p_id' => $adminId, 'role_id' => $role->id])->paginate($this->recordPerPage);
        if ($users) {
            return ['result' => true, 'data'=>$users->toArray()];
        }
        return ['result' => true, 'data' => ''];
    }

    /**
     * To delete users article which is in pending status
     * @param type $id
     * @return int
     */
    public function articleDelete($id) {
        //if id does not belong to logged user then no action
        if( UserArticle::where([ 'id' => $id, 'user_id' => getCurrentUser()->id, 'status' => 0])->delete()) {
            UserArticleDoc::where('user_article_id', $id)->delete();
        } else {
            return 0;
        }

        return 1;
    }

    /**
     * To update status of articles
     * @param type $id
     * @return bool
     */
    public function articleStatusUpdate($id) {
        return (new UserArticle)->updateStatus($id, getCurrentUser()->id);
    }
}
