@extends("layout.main")

@section("content")
          
        <div class="col-sm-9 col-md-offset-1 right">
            <h3 class="page-header">添加分类</h3>
            <form class="form-horizontal" method="post" action="/admin/addcatelog">
                {{csrf_field()}}
                <div class="form-group mytext">
                    <label for="title" class="col-sm-2 control-label mytitle">分类名称:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title" placeholder="请输入标题...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2">
                        <input type="submit" class="btn btn-default form-label" value="添加">
                    </label>
                </div>
            </form>
        </div>

@endsection