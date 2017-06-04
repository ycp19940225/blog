<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/6/3
 * Time: 17:38
 */

namespace App\Services\Admin;


use App\Http\Models\Users;
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

    public function checkUnique($field)
    {
       return $this->userDao->checkUnique($field);
    }

    public function getTables()
    {
        return $this->userDao->getTables();
    }
}