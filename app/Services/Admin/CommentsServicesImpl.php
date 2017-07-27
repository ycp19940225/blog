<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/6/3
 * Time: 17:38
 */

namespace App\Services\Admin;


use App\Models\Admin\Comments;
use App\Services\Ifs\Admin\CommentsServices;

class CommentsServicesImpl implements CommentsServices
{
    protected $commentDao;

    public function __construct()
    {
        $this->commentDao = new Comments();
    }


    public function save($request)
    {
        return $this->commentDao->create($request);
    }

    public function delete($id)
    {
        return $this->commentDao->where('id',$id)->update(['deleted_at'=>1]);
    }

    public function update($request)
    {
        unset($request['_token']);
        return $this->commentDao->where('id',$request['id'])->update($request);
    }

    public function getAll()
    {
        return $this->commentDao->where('deleted_at',0)->get();
    }

    public function getOne($id)
    {
        return $this->commentDao->find($id);
    }
}