<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    public function commentNum() {
        return $this -> hasMany('App\Comment', 'article_id', 'id') -> orderBy('created_at', 'desc');
    }

    public function catelog() {
        return $this -> belongsTo('App\Catelog', 'catelog_id', 'id');
    }
}
