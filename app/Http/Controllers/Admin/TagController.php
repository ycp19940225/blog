<?php
/**
 * Created by PhpStorm.
 * role: ycp
 * Date: 2017/5/31
 * Time: 22:37
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Admin\Tag;
use Illuminate\Http\Request;

class TagController extends controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new Tag();
    }

    /**
     * @name 标签首页
     * @desc 标签首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = $this->model->where('deleted_at',0)->get();
        return view('admin.tag.index',['data'=>$data,'title'=>'标签列表']);
    }

    /**
     * @name 添加标签页面
     * @desc 添加标签页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('admin.tag.edit',['title'=>'添加标签']);
    }

    /**
     * @name 添加标签操作
     * @desc 添加标签操作
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addOperate(Request $request)
    {
        if($this->model->create($request->input())){
            return response()->json(msg('success','添加成功!'));
        }
        return response()->json(msg('error','添加失败！'));
    }

    /**
     * @name 修改页面
     * @desc 修改页面
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @internal param Request $request
     */
    public function edit($id)
    {
        $data = $this->model->find($id);
        return view('admin.tag.edit',['data'=>$data,'title'=>'编辑标签']);
    }
    /**
     * @name 修改操作
     * @desc 修改操作
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function editOperate(Request $request)
    {
        $data = $request->input();
        unset($data['_token']);
        if($this->model->where('id',$request->input('id'))->update($data)){
            return response()->json(msg('success','修改成功!'));
        }
        return response()->json(msg('error','修改失败！'));
    }

    /**
     * @name 删除标签
     * @desc 删除标签
     * @param Request $request
     * @return mixed
     */
    public function delete(Request $request)
    {
        if($this->model->where('id',$request->input('id'))->update(['deleted_at'=>1])){
            return response()->json(msg('success','删除成功!'));
        } else
            return response()->json(msg('error','删除失败!'));
    }

}