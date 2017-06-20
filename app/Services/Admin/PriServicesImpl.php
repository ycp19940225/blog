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

class PriServicesImpl implements PriServices
{
    protected $priDao;
    public function __construct()
    {
        $this->priDao = new Pri();
    }

    public function getAll()
    {
        $this->priDao->getAll();
    }

    public function getOne($id)
    {
        // TODO: Implement getOne() method.
    }

    public function save()
    {
        return $this->priDao->addAppPri();
    }

    public function update()
    {
        return $this->priDao->refreshPri();
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}