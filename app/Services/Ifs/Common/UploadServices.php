<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/6/3
 * Time: 17:31
 */

namespace App\Services\Ifs\Common;
use Illuminate\Http\Request;

interface UploadServices
{
    public function uploadImg($uploadFiles);
}