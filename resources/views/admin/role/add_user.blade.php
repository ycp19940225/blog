@extends('admin.layouts.app')
@section('page.css')
    <link href="{{ loadStatic('admin/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" />
    @endsection
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
            <button class="btn btn-primary m-l-20" type="button" onclick=" window.location.href='/admin/role/add' ">添加角色</button>
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
                                <th>角色名</th>
                                <th>创建时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $k=>$v)
                            <tr>
                                <td>{{ $v['id'] }}</td>
                                <td>{{ $v['role_name'] }}</td>
                                <td>{{ $v['created_at'] }}</td>
                                <td>
                                    <p>
                                        <label>
                                            <input type="checkbox" name="status" class="js-switch " value="1" {{ $v['checked'] }} data-id="{{ $v['id'] }}"/>
                                        </label>
                                    </p>
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
@endsection
@section('page.js')
    <script src="{{ loadStatic('admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
@endsection
@section('script.js')

    <script>
        $(function () {

            $('[name="status"]').bootstrapSwitch({
                onText:"开启",
                offText:"关闭",
                onColor:"success",
                offColor:"info",
                size:"small",
                onSwitchChange:function(event,state){
                    var id = $(this).attr('data-id');
                    var data;
                    if(state==true){
                        $(this).val("1");
                        data = {
                            role_id:id,
                            admin_id:'{{ $user_id }}',
                            status:$(this).val(),
                            _token:'{{ csrf_token() }}'
                        };
                        console.log(data);
                        $.post("{{ url('admin/user/addUserOperate') }}",data,function (res) {
                            
                        });
                    }else{
                        $(this).val("0");
                        data = {
                            role_id:id,
                            admin_id:'{{ $user_id }}',
                            status:$(this).val(),
                            _token:'{{ csrf_token() }}'
                        };
                        $.post("{{ url('admin/user/addUserOperate') }}",data,function (res) {

                        });
                    }
                }
            })
        });
        /**
         * 删除
         * @param i
         */
        $("input[type='checkbox']").click(function () {
            
        });
    </script>
    @endsection