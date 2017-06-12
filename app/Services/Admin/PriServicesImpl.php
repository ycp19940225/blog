<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/6/3
 * Time: 17:38
 */

namespace App\Services\Admin;


use App\Models\Admin\Users;
use App\Services\Ifs\Admin\PriServices;
use App\Services\Ifs\Admin\UserServices;
use Illuminate\Http\Request;

class PriServicesImpl implements PriServices
{
    protected $userDao;
    public function __construct()
    {
        $this->userDao = new Users();
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function getOne($id)
    {
        // TODO: Implement getOne() method.
    }

    public function saveRole(Request $request)
    {
        // TODO: Implement saveRole() method.
    }

    public function updateRole($data)
    {
        // TODO: Implement updateRole() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}