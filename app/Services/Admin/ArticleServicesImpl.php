<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/6/3
 * Time: 17:38
 */

namespace App\Services\Admin;


use App\Models\Admin\Article;
use App\Services\Ifs\Admin\ArticleServices;
use Qiniu\Http\Request;

class ArticleServicesImpl implements ArticleServices
{
    protected $articleDao;
    public function __construct()
    {
        $this->articleDao = new Article();
    }

    public function getAll()
    {
        return $this->articleDao->getAll();
    }

    public function getOne($id)
    {
        return $this->articleDao->find($id);
    }

    public function save($request)
    {
        return $this->articleDao->addArticle($request);
    }

    public function update($request)
    {
        return $this->articleDao->updateArticle($request);
    }

    public function delete($id)
    {
        return $this->articleDao->where('id',$id)->update(['deleted_at'=>1]);
    }
}