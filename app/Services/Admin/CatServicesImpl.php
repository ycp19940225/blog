<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/6/3
 * Time: 17:38
 */

namespace App\Services\Admin;


use App\Models\Admin\Cat;
use App\Services\Ifs\Admin\CatServices;

class CatServicesImpl implements CatServices
{
    protected $catDao;

    public function __construct()
    {
        $this->catDao = new Cat();
    }


    public function save($request)
    {
        return $this->catDao->create($request);
    }

    public function delete($id)
    {
        return $this->catDao->where('id',$id)->update(['deleted_at'=>1]);
    }

    public function update($request)
    {
        unset($request['_token']);
        return $this->catDao->where('id',$request['id'])->update($request);
    }

    public function getAll()
    {
        return $this->catDao->where('deleted_at',0)->get();
    }

    public function getOne($id)
    {
        return $this->catDao->find($id);
    }

    public function getArticleByCatID($id,$limit='')
    {
        return $this->catDao->getArticleByCatID($id,$limit);
    }
}