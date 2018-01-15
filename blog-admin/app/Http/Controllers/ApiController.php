<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    protected $showNum = 5;

    public function getTotal() {
        $count = \DB::table('articles') -> count();
        return ['total' => $count, 'showNum' => $this -> showNum];
    }

    public function getArticle($page) {
        $skipNum = ($page - 1) * $this -> showNum;
        $articles = [];
        $article = [];
        $allArticles = \App\Article::orderBy('created_at', 'desc') -> skip($skipNum) -> take($this -> showNum) -> get();
        foreach($allArticles as $k => $v) {
            $article['id'] = $v -> id;
            $article['title'] = $v -> title;
            $article['introduction'] = $v -> introduction;
            $article['catelog'] = $v -> catelog['title'];
            $article['content'] = $v -> content;
            $article['time'] = $v -> created_at -> format('Y-m-d');
            $articles[] = $article;
        }
        return ['code' => 200, 'data' => $articles];
    }

    public function getArticleContent(\App\Article $article) {
        $articleContent['id'] = $article['id'];
        $articleContent['title'] = $article['title'];
        $articleContent['created_at'] = $article['created_at'] -> format('Y-m-d');
        $articleContent['catelog'] = $article['catelog'] -> title;
        $articleContent['catelog_id'] = $article['catelog'] -> id;
        $articleContent['content'] = $article['content'];
        return $articleContent;
    }

    public function getCatelog(\App\Catelog $allCatelogs) {
        $catelogs = $allCatelogs -> all();
        foreach($catelogs as $k => $v) {
            $arr['id'] = $v -> id;
            $arr['title'] = $v -> title;
            $arr['created_at'] = $v -> created_at -> format('Y-m-d');
            $arr['articles_num'] = count($v -> articles);
            $catelogsArr[] = $arr;
        }
        return $catelogsArr;
    }

    public function getCatelogArticle(\App\Catelog $catelog) {
        $catelogArticles['catelog_title'] = $catelog['title'];
        $catelogArticles['catelog_id'] = $catelog['id'];
        $catelogArticles['created_at'] = $catelog['created_at'] -> format('Y-m-d');
        $catelogArticles['articles'] = $catelog -> articles;
        return $catelogArticles;
    }

}
