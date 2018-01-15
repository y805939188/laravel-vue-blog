<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catelog extends Model
{
    //
    public function articles()
    {
        return $this->hasMany('App\Article', 'catelog_id', 'id');
    }
}
