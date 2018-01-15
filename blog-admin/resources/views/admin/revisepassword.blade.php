@extends("layout.main")

@section("content")              
    <div class="col-sm-9 col-md-offset-1 right">
        <h3 class="page-header">修改密码</h3>
        <form class="form-horizontal" method="post" action="/admin/revisepwd">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{csrf_field()}}
            <div class="form-group mytext">
                <label for="title" class="col-sm-2 control-label mytitle">原密码:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="title" name="original_password" placeholder="请输入原密码...">
                </div>
            </div>
            <div class="form-group mytext">
                <label for="title" class="col-sm-2 control-label mytitle">新密码:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="title" name="password" placeholder="请输入新密码...">
                </div>
            </div>
            <div class="form-group mytext">
                <label for="title" class="col-sm-2 control-label mytitle">确认密码:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="title" name="password_confirmation" placeholder="请确认新密码...">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-2">
                    <input type="submit" class="btn btn-default form-label" value="修改">
                </label>
            </div>
        </form>
    </div>
@endsection