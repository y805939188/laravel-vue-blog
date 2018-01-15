<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/articlecss.css">
    <link rel="stylesheet" href="/css/logincss.css">
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <title>后台</title>
</head>
<body>
    <div class="wrapper">
        <nav class="navbar navbar-default navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <a href="" class="navbar-brand">DING</a>
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="collapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="javascript:void(0);">欢迎您丁哥~</a></li>
                        <li><a href="/admin/logout">退出登录</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-sm-2 left">
                    <div class="article">
                        <h3 class="page-header">文章管理</h3>
                        <ul class="nav nav-sidebar">
                            <li>
                                <a href="/admin">
                                    <i class="glyphicon glyphicon-file"></i>&nbsp;文章列表
                                </a>
                            </li>
                            <li>
                                <a href="/admin/addarticle">
                                    <i class="glyphicon glyphicon-pencil"></i>&nbsp;添加文章
                                </a>
                            </li>
                            <li>
                                <a href="/admin/cateloglist">
                                    <i class="glyphicon glyphicon-th-list"></i>&nbsp;分类列表
                                </a>
                            </li>
                            <li>
                                <a href="/admin/addcatelog">
                                    <i class="glyphicon glyphicon-plus"></i>&nbsp;添加分类
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="article">
                        <h3 class="page-header">管理自己</h3>
                        <ul class="nav nav-sidebar">
                            <li>
                                <a href="/admin/revisepwd">
                                    <i class="glyphicon glyphicon-lock"></i>&nbsp;修改密码
                                </a>
                            </li>
                        </ul>
                    </div>             
                </div>
                @yield("content")                     
            </div>
        </div>
    </div>
</body>
</html>