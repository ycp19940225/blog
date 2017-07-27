<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/7/27
 * Time: 17:31
 */

namespace App\Services\Ifs\Admin;

interface CommentsServices
{
    //添加
    public function save($request);
    //删除
    public function delete($id);
    //更新
    public function update($request);
    //获取全部
    public function getAll();
    //获取一个
    public function getOne($id);
}