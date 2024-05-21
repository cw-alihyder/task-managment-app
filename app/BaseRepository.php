<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class BaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function get($orderBy = [], $where = [])
    {
        $model = $this->model;

        if(count($orderBy) > 0)
        {
            $model = $this->model->orderBy($orderBy[0], $orderBy[1]);
        }

        if(count($where) > 0)
        {
            $model = $this->model->where($where);
        }

        return $model->get();

    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        return $this->model->find($id)->update($data);
    }

    public function delete($id)
    {
        return $this->model->whereId($id)->delete();
    }
}
