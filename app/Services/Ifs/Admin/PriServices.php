<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/6/3
 * Time: 17:31
 */

namespace App\Services\Ifs\Admin;
use Illuminate\Http\Request;

interface PriServices
{
    //获取全部
    public function getAll();
    //获取一个
    public function getOne($id);
    //添加
    public function saveRole(Request $request);
    //更新
    public function updateRole($data);

    public function delete($id);
}