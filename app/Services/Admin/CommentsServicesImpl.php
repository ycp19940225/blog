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
use Auth;

class CommentsServicesImpl implements CommentsServices
{
    protected $commentDao;

    public function __construct()
    {
        $this->commentDao = new Comments();
    }


    public function save($request)
    {
        $data= $request;
        if(Auth::check()){

        }else{
            unset($request['parent_id'],$request['belong'],$request['content']);
            $data['comment_info'] =json_encode($request);
        }
        return $this->commentDao->create($data);
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