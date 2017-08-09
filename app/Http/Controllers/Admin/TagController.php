<?php
/**
 * Created by PhpStorm.
 * role: ycp
 * Date: 2017/5/31
 * Time: 22:37
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Services\Ifs\Admin\TagServices;
use Illuminate\Http\Request;

class TagController extends controller
{
    protected $tagServices;

    public function __construct(TagServices $tagServices)
    {
        $this->tagServices = $tagServices;
    }

    /**
     * @name 标签首页
     * @desc 标签首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = $this->tagServices->getAll();
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
        if($this->tagServices->save($request->input())){
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
        $data = $this->tagServices->getOne($id);
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
        if($this->tagServices->update($request->input())){
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
        if($this->tagServices->delete($request->input('id'))){
            return response()->json(msg('success','删除成功!'));
        } else
            return response()->json(msg('error','删除失败!'));
    }

}