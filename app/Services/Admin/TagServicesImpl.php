<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/6/3
 * Time: 17:38
 */

namespace App\Services\Admin;


use App\Models\Admin\Tag;
use App\Services\Ifs\Admin\TagServices;

class TagServicesImpl implements TagServices
{
    protected $tagDao;

    public function __construct()
    {
        $this->tagDao = new Tag();
    }


    public function save($request)
    {
        return $this->tagDao->create($request);
    }

    public function delete($id)
    {
        return $this->tagDao->where('id',$id)->update(['deleted_at'=>1]);
    }

    public function update($request)
    {
        unset($request['_token']);
        return $this->tagDao->where('id',$request['id'])->update($request);
    }

    public function getAll()
    {
        return $this->tagDao->where('deleted_at',0)->get();
    }

    public function getOne($id)
    {
        return $this->tagDao->find($id);
    }
}