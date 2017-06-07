<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/6/3
 * Time: 17:38
 */

namespace App\Services\Admin;


use App\Models\Admin\Users;
use App\Services\Ifs\Admin\UserServices;
use Illuminate\Http\Request;

class UserServicesImpl implements UserServices
{
    protected $userDao;
    public function __construct()
    {
        $this->userDao = new Users();
    }

    public function saveUser(Request $request)
    {
        return $this->userDao->addUser($request);
    }

    public function checkUnique($field,$id='')
    {
       return $this->userDao->checkUnique($field,$id);
    }

    public function getTables()
    {
        return $this->userDao->getTables();
    }

    public function select()
    {
        return $this->userDao->select('id','adminname','email','updated_at','created_at')->get();
    }

    public function updateUser($data)
    {
        return $this->userDao->edit($data);
    }

    public function find($id)
    {
        return $this->userDao->where('id','=',$id)->first();
    }
}