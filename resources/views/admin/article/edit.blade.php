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
                        <form action="" class="form-horizontal" role="form" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="hidden" name="id" value="{{ $data['id'] or '' }}">
                                <label for="name" class="col-xs-3 control-label">标题</label><em style="color:red">*</em>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $data['title'] or ''}}" placeholder="请输入标题" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-xs-3 control-label">分类</label>
                                <div class="col-xs-2">
                                    <select name="newsType" class="form-control" title="">
                                        <option selected="" value="-1">默认分类</option>
                                    @foreach($cats as $v)
                                            <option value="$v->id">{{ $v->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="tags" name="tags" value="{{ $data['intro'] or ''}}" data-id='' placeholder="请填写标签">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-xs-3 control-label">文章</label>
                                <div class="col-xs-4">
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
@section('page.js')
    // 引入编辑器代码
    @include('editor::head')
@endsection
@section('script.js')
    <script>
        /**
         * 表单提交
         */
        $("#submit").click(function () {
           var data = $("form").serialize();
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
            console.log(res);
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
            'onAddTag':push_tag_id(),
            /*'onRemoveTag':callback_function,
            'onChange' : callback_function,*/
            'delimiter': [','],   // Or a string with a single delimiter. Ex: ';'
            'removeWithBackspace' : true,
            'minChars' : 0,
            'maxChars' : 0, // if not provided there is no limit
            'placeholderColor' : '#666666'
        });
        function push_tag_id(e){
            console.log(e);
        }
    </script>
    @endsection