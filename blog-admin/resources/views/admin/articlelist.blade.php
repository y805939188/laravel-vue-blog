@extends("layout.main")

@section("content")                    
    <div class="col-sm-9 col-md-offset-1 right">
        @if(session('addsuccess'))
        <div class="alert alert-success">
            {{session('addsuccess')}}
        </div>
        @elseif(session('delsuccess'))
        <div class="alert alert-success">
            {{session('delsuccess')}}
        </div>
        @elseif(session('editsuccess'))
        <div class="alert alert-success">
            {{session('editsuccess')}}
        </div>
        @elseif(session('revisepwdsuccess'))
        <div class="alert alert-success">
            {{session('revisepwdsuccess')}}
        </div>
        @endif
        <h3 class="page-header">列表</h3>
        <form action="" class="form-inline myform">
            <div class="form-group">
                <label for="">选择分类:</label>
                <select name="" id="" class="form-control">
                    <option value="">afasdfads</option>
                    <option value="">b</option>
                    <option value="">c</option>
                    <option value="">d</option>
                    <option value="">e</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">关键字:</label>
                <input type="text" class="form-control" placeholder="请输入关键字...">
                <input type="submit" class="btn btn-default">
            </div>
        </form>
        <table class="table table-bordered">
            <tr>
                <th width="100">标题</th>
                <th width="100">分类</th>
                <th width="100">时间</th>
                <th width="100">评论</th>
                <th width="150">管理</th>
            </tr>
            @foreach($articles as $k => $v)
            <tr>
                <td>{{$v['title']}}</td>
                <td>{{$v->catelog['title']}}</td>
                <td>{{$v['created_at']}}</td>
                <td>{{$v->comment_num_count}}</td>
                <td>
                    <div class="btn-group">
                        <a class="btn btn-success mybtn" href="/blog/articlelist">查看</a>
                        <a class="btn btn-info mybtn" href="/admin/editarticle/{{$v['id']}}">编辑</a>
                        <button type="button" class="btn btn-danger mybtn" data-toggle="modal" data-target="#myModal" onclick="delClick({{$v['id']}})">删除</button>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
        {{$articles -> links()}}
    </div>
    <!-- Button trigger modal -->

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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

    <script>
        function delClick(num) {
            $('#myModel').attr('href', "/admin/delarticle/" + num);
        }
    </script>
@endsection

