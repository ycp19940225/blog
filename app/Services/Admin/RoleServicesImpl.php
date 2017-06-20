<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/6/3
 * Time: 17:38
 */

namespace App\Services\Admin;


use App\Models\Admin\Role;
use App\Services\Ifs\Admin\RoleServices;
use Illuminate\Http\Request;

class RoleServicesImpl implements RoleServices
{
    protected $roleDao;
    public function __construct()
    {
        $this->roleDao = new Role();
    }


    public function getAll()
    {
        return $this->roleDao->getAll();
    }

    public function getOne($id)
    {
        return $this->roleDao->find($id);
    }

    public function saveRole(Request $request)
    {
        return $this->roleDao->addRole($request);
    }

    public function updateRole($data)
    {
        return $this->roleDao->updateRole($data);
    }

    public function checkUnique($field, $id = '')
    {
        return $this->roleDao->checkUnique($field, $id = '');
    }

    public function delete($id)
    {
        return $this->roleDao->where('id',$id)->delete();
    }

    public function updateRolePri($data)
    {
        return $this->roleDao->updateRolePri($data);
    }
}