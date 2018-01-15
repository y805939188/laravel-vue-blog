<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AdminController extends Controller
{

    //
    public function __construct() {
        $this -> middleware('admin.validate') -> except(['loginForm', 'login']);
    }

    public function index(\App\Article $article) {                 //这个方法是在查出来的表中给添加
                                                                   //一个属性 但是该属性的命名规范是
        //$articles=$article->withCount(['commentNum'])->get()也行 //会把aaaBaa这种变成aaa_baaa_conut 
        $articles = \App\Article::orderBy('created_at', 'desc') -> withCount(['commentNum']) -> paginate(5);
        //paginate(num) 分页之后 直接在视图中写 {{$传过去的文章们变量 -> }}
        // dd($articles -> all()[0] -> id);
        return view('admin.articlelist', compact('articles'));
    }

    public function loginForm() {
        return view('admin.login');
    }

    public function login() {
        $username = request() -> input('username');
        $password = request() -> input('password');
        $is_remember = isset(request() -> all()['is_remember']) ? true : false;

        // 这里验证时不要忘记在模型中继承验证方法的类
        if(\Auth::guard('admin')->attempt(['username' => $username, 'password' => $password], $is_remember)) {
            return redirect('/admin');
        }else {
            return redirect('/admin/login') -> with('error', '用户名或密码错误');
        }
    }

    public function logout() {
        \Auth::guard('admin') -> logout(); //清除session完成退出
        return redirect('/admin/login');
    }

    public function editArticle(\App\Article $article) {
        $catelog = $article -> catelog;
        $catelogs = \App\Catelog::get();
        // dd(self::$catelogs);
        return view('admin.editarticle', compact(['article', 'catelogs']));
    }

    public function editArticleUpdate() {
        // dd(request()['catelog_id']);
        $this -> validate(request(), [
            'title' => 'required|string|max:100',
            'content' => 'required|string|min:10',
            'catelog_id' => 'required'
        ], [
            'title.max' => '文章标题过长',
            'content.min' => '文章内容太短'
        ]);

        $id = request('id');
        $article = \App\Article::find($id);
        $article -> title = request('title');
        $article -> content = request('content');
        $article -> catelog_id = request('catelog_id');
        $article -> save();
        return redirect('/admin') -> with('editsuccess', '修改成功');
    }

    public function delArticleUpdate(\App\Article $article) {
        $article -> delete();
        return redirect('/admin') -> with('delsuccess', '删除成功'); 
    }

    public function cateloglist() {                                // 这个分页器 前面不能直接用::get()之类的方法
        $catelogs = \App\Catelog::orderBy('created_at', 'desc') -> paginate(5);
        return view('admin.cateloglist', compact('catelogs'));
    }

    public function addArticleShow() {
        $catelogs = \App\Catelog::get();
        return view('admin.addarticle', compact('catelogs'));
    }

    public function addArticleUpdate(\App\Article $article, Request $request) {
        // dd($request['content']);
        $this -> validate($request, [
            'title' => 'required|string|max:100',
            'content' => 'required|string|min:10',
            'catelog_id' => 'required'
        ], [
            'title.max' => '文章标题过长,请限制在100字符内',
            'content.min' => '文章内容太短,请在十字以上',
            'title.required' => '请填写文章标题',
            'content.required' => '请填写文章内容',
        ]);
        $article -> title = $request['title'];
        $article -> catelog_id = intval($request['catelog_id']);
        // dd(intval($request['catelog_id']));
        $article -> content = $request['content'];
        $article -> save();
        return redirect('/admin') -> with('addsuccess', '添加成功'); 
    }

    public function editCatelogShow(\App\Catelog $catelog) {
        return view('admin.editcatelog', compact('catelog'));
    }

    public function editCatelogUpdate() {
        $this -> validate(request(), [
            'title' => 'required|string|max:100',
        ], [
            'title.max' => '标题过长,请限制在100字符内',
            'title.required' => '请填写标题'
        ]);
        $id = request('id');
        $title = request('title');
        $catelog = \App\Catelog::find($id);
        $catelog -> title = $title;
        $catelog -> save();
        return redirect('/admin/cateloglist') -> with('editcatesuccess', '修改成功');
        // dd($id, $title);
    }

    public function delCatelog(\App\Catelog $catelog) {
        $catelog -> delete();
        return redirect('/admin/cateloglist') -> with('delcatesuccess', '删除分类成功');
    }

    public function addCatelogShow() {
        return view('admin.addcatelog');
    }

    public function addCatelogUpdate() {
        $catelog = new \App\Catelog;
        $catelog -> title = request('title');
        $catelog -> save();
        return redirect('/admin/cateloglist') -> with('addcatesuccess', '添加分类成功');

    }

    public function revisePwdShow() {
        return view('admin.revisepassword');
    }

    public function reviserPwdUpdate(\App\Http\Requests\AdminRequest $request) {
        $user = \Auth::guard('admin') -> user();
        $user -> password = bcrypt($request['password']);
        $user -> save();
        return redirect('/admin') -> with('revisepwdsuccess', '修改密码成功');
    }
}
