<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleTopic extends Model
{
    //
    
    public function getByName($topic) {
        return $this->where('name', $topic)->first();
    }
}
