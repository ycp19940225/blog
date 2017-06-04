<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/6/3
 * Time: 17:31
 */

namespace App\Services\Ifs\Admin;
use Illuminate\Http\Request;

interface UserServices
{
    public function saveUser(Request $request);
    public function checkUnique($field);

    public function getTables();
}