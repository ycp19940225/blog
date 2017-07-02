@extends('admin.layouts.app')
@section('page.content')
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li><a href="javascript:;">{{ $title }}</a></li>
        <li class="active">{{ $title }}</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">{{ $title }}
        <small>
            <button class="btn btn-primary m-l-20" type="button" onclick=" window.location.href='/admin/admin/add' ">添加用户</button>
        </small>
    </h1>
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-md-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">{{ $title }}</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="data-table" class="table table-hover table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>账号</th>
                                <th>角色</th>
                                <th>创建时间</th>
                                <th>修改时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $k=>$v)
                            <tr>
                                <td>{{ $v['id'] }}</td>
                                <td>{{ $v['adminname'] }}</td>
                                <td>
                                    @foreach($v->roles as $role)
                                    {{ $role->role_name or '' }}
                                        @endforeach
                                </td>
                                <td>{{ $v['created_at'] }}</td>
                                <td>{{ $v['updated_at'] }}</td>
                                <td>
                                    <a class="btn btn-info btn-xs m-2 detail" href="{{ url('admin/admin/edit',['id'=>$v['id']]) }}" >编辑</a>
                                    <a href="JavaScript:void(0)" onclick="del({{ $v['id'] }})" class="btn btn-danger btn-xs m-2 delete" >删除</a>
                                    <a href="{{ url('admin/role/addUser',['id'=>$v['id']]) }}" class="btn btn-success btn-xs m-2 delete" >角色</a>
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
{{--    <!-- 修改模态框（Modal） -->
    <div class="modal fade" id="update_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">编辑用户</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="update" role="form">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">物流公司</label>
                            <div class="col-sm-10">
                                {{ csrf_field() }}
                                <label for="id"></label><input type="text" name="id" id="id" style="display: none">
                                <div class="form-group">
                                    <label for="name" class="col-xs-4 control-label">账号</label>
                                    <div class="col-xs-5">
                                        <input type="text" class="form-control" id="name" name="adminname" placeholder="请输入名字">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-xs-4 control-label">密码</label>
                                    <div class="col-xs-5">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="请输入密码">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-primary save">保存</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>--}}

@endsection
@section('page.js')
@endsection
@section('script.js')
    <script>
        /**
         * 删除
         * @param i
         */
        function del(i) {
            //询问框
            layer.confirm('是否删除？', {
                title:'确认操作',
                btn: ['是','否'] //按钮
            }, function(){
                var _token =  "{{ csrf_token() }}";
                var data = {
                    id:i,
                    _token: _token
                };
                console.log(data);
                $.post("{{ url('admin/admin/delete') }}",data,function (res) {
                    console.log(res);
                    if(res['code'] === 'success'){
                        layer.msg(res['msg'],{icon: 6});
                        setTimeout('location.href="{{ url('admin/admin/index') }}"',2000);
                    }else{
                        layer.msg(res['msg'],{icon:5});
                    }
                },"json");
            });
        }
    </script>
    @endsection