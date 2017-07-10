<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/6/3
 * Time: 17:38
 */

namespace App\Services\Admin;


use App\Models\Admin\Pri;
use App\Services\Ifs\Admin\PriServices;

class ArticleServicesImpl implements PriServices
{
    protected $priDao;
    public function __construct()
    {
        $this->priDao = new Pri();
    }

    public function getAll()
    {
        return $this->priDao->getAll();
    }

    public function getOne($id)
    {
        // TODO: Implement getOne() method.
    }

    public function save()
    {
        // TODO: Implement getOne() method.
    }

    public function update()
    {
        return $this->priDao->refreshPri();
    }


    public function getRolePris($role_id)
    {
        return $this->priDao->getRolePris($role_id);
    }
}