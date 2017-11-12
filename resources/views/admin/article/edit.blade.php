@extends('admin.layouts.app')
<style>
    .editor{
        z-index:9999
    }
</style>
@section('page.js')

    @include('editor::head')
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
                        <form action="" class="form-horizontal" role="form" method="post" id="add_post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="hidden" name="id" value="{{ $data['id'] or '' }}">
                                <label for="name" class="col-xs-3 control-label">标题</label><em style="color:red">*</em>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $data['title'] or ''}}" placeholder="请输入标题" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="intro" class="col-xs-3 control-label">简介</label><em style="color:red">*</em>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" id="intro" name="intro" value="{{ $data['intro'] or ''}}" placeholder="请输入简介" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-xs-3 control-label">分类</label>
                                <div class="col-xs-2">
                                    <select name="cat_id" class="form-control" id='cats' itle="">
                                        <option selected="" value="-1">默认分类</option>
                                        @foreach($cats as $v)
                                            <option value="{{ $v->id }}" {{ $v->selected or '' }}>{{ $v->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="button" class="btn btn-primary btn-xs" id="add_cat">添加一个分类</button>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="tags" name="tags" value="
                                    @if(isset($data))
                                    @foreach($data->tag as $tag)
                                    {{ $tag->name }},
                                    @endforeach
                                    @endif
                                            " data-id='' placeholder="请填写标签">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-md-offset-1">
                                    <div class="form-group editor">
                                        <label for="myEditor"></label><textarea id='myEditor' name="content">{{ $data['content'] or ''}}</textarea>
                                    </div>
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
         * 设置token,防止跨站脚本攻击
         */
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        /**
         * 表单提交
         */
        $("#submit").click(function () {
            var form =$("#add_post");
            var error = form.valid();//表单验证
            var data = form.serialize();
            var method = "{{ Route::current()->getActionMethod() }}";
            if(method === 'edit'){
                $.post('{{ url('admin/article/editOperate') }}',data,function (res) {
                    handle(res);
                },"json");
            }else{
                if(validation() === false){
                    return false;
                }
                $.post('{{ url('admin/article/addOperate') }}',data,function (res) {
                    handle(res);
                }).error(function(res){
                    layer.msg('请完整填写表单！',{icon:5});
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
                setTimeout('location.href="{{ url('admin/article/index') }}"',1000);
            }else{
                layer.msg(res['msg'],{icon:5});
            }
        }
        /**
         * 标签
         */
        $('#tags').tagsInput({
            'autocomplete_url':'{{ url('admin/article/getTags') }}',
            'autocomplete': {selectFirst:true,width:'auto',autoFill:true},
            'height':'auto',
            'width':'auto',
            'interactive':true,
            'defaultText':'添加标签',
            /*'onAddTag':push_tag_id(),*/
            /*'onRemoveTag':callback_function,
            'onChange' : callback_function,*/
            'delimiter': [','],   // Or a string with a single delimiter. Ex: ';'
            'removeWithBackspace' : true,
            'minChars' : 0,
            'maxChars' : 0, // if not provided there is no limit
            'placeholderColor' : '#666666'
        });
        /**
         * 快捷添加分类
         */
        $("#add_cat").click(function () {
            //页面层-自定义
            layer.open({
                type: 1,
                title: '添加一个分类',
                area: ['300px', '140px'],
                offset: '100px',
                closeBtn: 1,
                shadeClose: true,
                skin: 'yourclass',
                content: '<input type="text" class="form-control" id="add_cat_text" name="add_cat" value="" placeholder="请输入分类" >',
                btn: ['确定'],
                yes:function () {
                    var cat = $("#add_cat_text").val();
                    var data = {
                        'name':cat
                    };
                    $.post('{{ url('admin/cat/addOperate') }}',data,function (res) {
                        if(res['code'] === 'success'){
                            $("#cats").append('<option value="'+res['data']['id']+'">'+res['data']['name']+'</option>');
                            layer.msg(res['msg'],{icon:6,time:1000});
                            layer.closeAll('page'); //关闭所有页面层
                        }
                        else{

                        }
                    },'json');
                }
            });
        });
    </script>
@endsection