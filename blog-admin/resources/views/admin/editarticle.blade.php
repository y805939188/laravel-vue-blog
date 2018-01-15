@extends("layout.main")

@section("content")        

    <div class="col-sm-9 col-md-offset-1 right">
        <h3 class="page-header">添加文章</h3>
        @if(count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </div>
        @endif
        <form class="form-horizontal" method="post" action="/admin/editarticle">
            {{csrf_field()}}
            <input type="hidden" value="{{$article['id']}}" name="id">
            <div class="form-group mytext">
                <label for="title" class="col-sm-2 control-label mytitle">文章标题:</label>
                <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" id="title" placeholder="请输入标题..." value="{{$article['title']}}">
                </div>
            </div> 
            <div class="form-group mytext">
                <label for="title" class="col-sm-2 control-label mytitle">文章分类:</label>
                <div class="col-sm-10">
                    <select name="catelog_id" id="" class="form-control">
                        @foreach($catelogs as $k => $v)
                            @if($v -> title === $article -> catelog -> title)
                                <option selected value="{{$v -> id}}">{{$v -> title}}</option>
                            @else
                                <option value="{{$v -> id}}">{{$v -> title}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>   
            <div class="form-group mytext">
                <label for="" class="form-label col-sm-2">文章内容:</label>
                <div class="col-sm-10">
                    <textarea name="content" id="" cols="30" rows="10" class="form-control">{{$article['content']}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2">
                    <input type="submit" class="btn btn-default" value="提交">
                </div>
            </div>
        </form>
    </div>
@endsection