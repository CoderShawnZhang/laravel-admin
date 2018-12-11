<?php
/**
 * 模型仓库抽象类
 */

namespace App\Repository;


use App\Traits\Repository\BaseRepositoryTraits;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Factory;

abstract class BaseRepository
{
    use BaseRepositoryTraits;

    protected $model;

    protected $validator;

    public function __construct(Model $model, Factory $validator)
    {
        $this->model = $model;
        $this->validator = $validator;
    }


}