@extends("layout.main")

@section("content")
        <div class="col-sm-9 col-md-offset-1 right">
            <h3 class="page-header">添加分类</h3>
            <form class="form-horizontal" method="post" action="/admin/editcatelog">
                {{csrf_field()}}
                <input type="hidden" value="{{$catelog -> id}}" name="id">
                <div class="form-group mytext">
                    <label for="title" class="col-sm-2 control-label mytitle">分类名称:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title" value="{{$catelog -> title}}">
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