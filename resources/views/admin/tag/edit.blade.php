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
            <button class="btn btn-primary m-l-20" type="button" onclick=" javascript:history.go(-1) ">返回列表</button>
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
                                <label for="name" class="col-xs-3 control-label">标签名</label><em style="color:red">*</em>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $data['name'] or ''}}" placeholder="请输入标签名" required>
                                </div>
                            </div>
                            <div class="col-md-offset-5" >
                                <button type="button" class="btn btn-success m-2" id="submit" >保存</button>
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
           var data = $("form").serialize();
            var method = "{{ Route::current()->getActionMethod() }}";
            if(method === 'edit'){
                $.post('{{ url('admin/tag/editOperate') }}',data,function (res) {
                    handle(res);
                },"json");
            }else{
                if(validation() === false){
                    return false;
                }
                $.post('{{ url('admin/tag/addOperate') }}',data,function (res) {
                    handle(res);
                });
            }
        });
        /**
         * 表单验证
         */
        function validation() {

        }
        /**
         * 结果处理
         */
        function handle(res){
            if(res['code'] === 'success'){
                layer.msg(res['msg'],{icon: 6});
                setTimeout('location.href="{{ url('admin/tag/index') }}"',1000);
            }else{
                layer.msg(res['msg'],{icon:5});
            }
        }
        //禁止回车键提交表单——动态绑定
        $(function(){
            $("input").on('keypress',  //所有input标签回车无效，当然，可以根据需求自定义
                function(e){
                    var key = window.event ? e.keyCode : e.which;
                    if(key.toString() === "13"){
                        return false;
                    }
                }
            );
        });
    </script>
    @endsection