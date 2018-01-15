@extends("layout.main")

@section("content")
    <div class="gakki-background">
        <div class="container mylogin">
            <div class="row">
                <div class="col-sm-5 col-sm-offset-3">
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                    @endif
                    <h2 class="page-header">请登录</h2>
                    <div class="col-sm-10 col-sm-offset-1">
                        <form action="/admin/login" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="username">用户名:</label>
                                <input type="text" id="username" name="username" class="form-control input" placeholder="请输如用户名...">
                            </div>
                            <div class="form-group">
                                <label for="password">密码:</label>
                                <input type="password" id="password" name="password" class="form-control input" placeholder="请输入密码...">
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="is_remember"> 记住我
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-default input" value="登录">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection("content")