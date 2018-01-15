@extends("layout.main")

@section("content")                 
    <div class="col-sm-9 col-md-offset-1 right">
        @if(session('editcatesuccess'))
        <div class="alert alert-success">
            {{session('editcatesuccess')}}
        </div>
        @elseif(session('delcatesuccess'))
        <div class="alert alert-success">
            {{session('delcatesuccess')}}
        </div>
        @elseif(session('addcatesuccess'))
        <div class="alert alert-success">
            {{session('addcatesuccess')}}
        </div>
        @endif
        <h3 class="page-header">列表</h3>
        <table class="table table-bordered">
            <tr>
                <th width="100">分类标题</th>
                <th width="100">创建时间</th>
                <th width="150">管理分类</th>
            </tr>
            @foreach($catelogs as $k => $v)
            <tr>
                <td>{{$v -> title}}</td>
                <td>{{$v -> created_at}}</td>
                <td>
                    <div class="btn-group">
                        <a class="btn btn-info mybtn" href="/admin/editcatelog/{{$v['id']}}">编辑</a>
                        @if(count($v -> articles) > 0)
                            <button type="button" class="btn btn-danger mybtn" data-toggle="modal" data-target="#myModal1">删除</button>
                        @elseif(count($v -> articles) === 0)
                            <button type="button" class="btn btn-danger mybtn" data-toggle="modal" data-target="#myModal2" onclick="delClick({{$v->id}})">删除</button>
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
        {{$catelogs -> links()}}
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">确认删除</h4>
                    </div>
                    <div class="modal-body">丁哥您确定要删除吗</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">算了</button>
                        <a type="button" class="btn btn-primary" id="myModel">删 ! </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">无法删除</h4>
                    </div>
                    <div class="modal-body">因为该目录下仍然有文章, 请删除所有文章后在来删除</div>
                </div>
            </div>
        </div>
    
        <script>
            function delClick(num) {
                $('#myModel').attr('href', "/admin/delcatelog/" + num);
            }
        </script>
    </div>
@endsection