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
            <button class="btn btn-primary m-l-20" type="button" onclick=" javascript:window.location.href='{{ url('common/uploadLogo') }}' ">修改头像</button>
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
                    <div class="row">
                        <form action="" class="form-horizontal form_need_validate" role="form" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="hidden" name="id" value="{{ $data['id'] or '' }}">
                                <label for="name" class="col-xs-4 control-label">账号</label>
                                <div class="col-xs-5">
                                    <input type="text" class="form-control" id="name" name="adminname" value="{{ $data['adminname'] or ''}}" placeholder="请输入名字" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-xs-4 control-label">密码</label>
                                <div class="col-xs-5">
                                    <input type="password" class="form-control" id="password" name="password" value="{{ $data['password'] or ''}}" placeholder="请输入密码" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-xs-4 control-label">邮箱</label>
                                <div class="col-xs-5">
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $data['email'] or ''}}" placeholder="请输入邮箱" >
                                </div>
                            </div>
                            <div class="col-md-offset-5" >
                                <button type="button" class="btn btn-success m-2" id="submit" name="repass">保存</button>
                                <button type="reset" class="btn btn-success m-2" id="reset" name="repass">重置</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
@endsection
@section('script.js')
    <script>
        /**
         * 表单提交
         */
        $("#submit").click(function () {
            /**
             *表单验证
             */
            if(!$(".form_need_validate").valid()){
                return false;
            }
           var data = validation();
            $.post('{{ url('common/doSetting') }}',data,function (res) {
                handle(res);
            },"json");
        });
        /**
         * 表单验证
         */
        function validation() {
            var password = $("#password").val();
            var repass = $("#repass").val();
            var email = $("#email").val();
            return $("form").serialize();
        }
        /**
         * 结果处理
         */
        function handle(res){
            console.log(res);
            if(res['code'] === 'success'){
                layer.msg(res['msg'],{icon: 6});
                setTimeout('location.href="{{ url('/admin') }}"',1000);
            }else{
                layer.msg(res['msg'],{icon:5});
            }
        }
    </script>
    @endsection