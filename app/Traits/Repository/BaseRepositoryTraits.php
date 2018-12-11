<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2018/11/15
 * Time: 下午2:42
 */

namespace App\Traits\Repository;


trait BaseRepositoryTraits
{
    public function create(array $data)
    {
        return $this->model::create($data);
    }

    public function findOne(array $condition = [])
    {
        return $this->model::where($condition)->first();
    }

    public function findAll(array  $condition =[],$orderBy = 'id')
    {
        return $this->model->where($condition)->orderBy($orderBy,'asc')->get();
    }

    public function all()
    {
        return $this->model::all();
    }

    public function likeName($fiels,$option,$val)
    {
        return $this->model::where($fiels,$option,'%'.$val.'%')->get();
    }

    /**
     * 删除,根据ids
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->model::destroy($id);
    }

    public function delete($condition = []){
        return $this->model::where($condition)->delete();
    }

    public function update($condition,$update)
    {
        return $this->model::where($condition)->update($update);
    }

    public function updateById($id,$update)
    {
        return $this->model::where('id',$id)->update($update);
    }
}