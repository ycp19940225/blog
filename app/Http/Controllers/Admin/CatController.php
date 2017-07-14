<?php
/**
 * Created by PhpStorm.
 * role: ycp
 * Date: 2017/5/31
 * Time: 22:37
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Services\Ifs\Admin\CatServices;
use Illuminate\Http\Request;

class CatController extends controller
{
    protected $catService;

    public function __construct(CatServices $catServices)
    {
        $this->catService = $catServices;
    }

    /**
     * @name 分类首页
     * @desc 分类首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = $this->catService->getAll();
        return view('admin.cat.index',['data'=>$data,'title'=>'分类列表']);
    }

    /**
     * @name 添加分类页面
     * @desc 添加分类页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('admin.cat.edit',['title'=>'添加分类']);
    }

    /**
     * @name 添加分类操作
     * @desc 添加分类操作
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addOperate(Request $request)
    {
        if($this->catService->save($request->input())){
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
        $data = $this->catService->getOne($id);
        return view('admin.cat.edit',['data'=>$data,'title'=>'编辑分类']);
    }
    /**
     * @name 修改操作
     * @desc 修改操作
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function editOperate(Request $request)
    {
        if($this->catService->update($request->input())){
            return response()->json(msg('success','修改成功!'));
        }
        return response()->json(msg('error','修改失败！'));
    }

    /**
     * @name 删除分类
     * @desc 删除分类
     * @param Request $request
     * @return mixed
     */
    public function delete(Request $request)
    {
        if($this->catService->delete($request->input('id'))){
            return response()->json(msg('success','删除成功!'));
        } else
            return response()->json(msg('error','删除失败!'));
    }

}