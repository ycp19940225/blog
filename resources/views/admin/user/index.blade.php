@extends('admin.layouts.app')
@section('page.css')
@endsection
@section('page.content')
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li><a href="javascript:;">Extra</a></li>
        <li class="active">Search Results</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Search Results <small>3 results found</small></h1>
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
                    <h4 class="panel-title">Data Table - Default</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="data-table" class="table table-hover table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>adminname</th>
                                <th>password</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                            </tr>
                            </thead>
                            <tbody>

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
@endsection
@section('script.js')
    <script>
        $(function () {
            $("#data-table").dataTable({
               "language": {
                   "sProcessing": "读取中...",
                   "sLengthMenu": "显示 _MENU_ 项结果",
                   "sZeroRecords": "没有匹配结果",
                   "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
                   "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
                   "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
                   "sInfoPostFix": "",
                   "sSearch": "搜索:",
                   "sUrl": "",
                   "sEmptyTable": "表中数据为空",
                   "sLoadingRecords": "载入中...",
                   "sInfoThousands": ",",
                   "oPaginate": {
                       "sFirst": "首页",
                       "sPrevious": "上页",
                       "sNext": "下页",
                       "sLast": "末页"
                   },
                   "oAria": {
                       "sSortAscending": ": 以升序排列此列",
                       "sSortDescending": ": 以降序排列此列"
                   }
               },
                serverSide: true,
                processing: true,
                ajax: {
                    url: '/admin/user/tables',
                },
               columns: [
                   { data: 'id', name: 'id' },
                   { data: 'adminname', name: 'adminname' },
                   { data: 'password', name: 'password' },
                   { data: 'created_at', name: 'created_at' },
                   { data: 'updated_at', name: 'updated_at' },
               ]
           });
        });
    </script>
    @endsection