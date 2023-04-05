<?php

namespace App\Services\CrudService;

use Illuminate\Database\Eloquent\Model;

class CrudRepository implements CrudInterface
{

    public function create(object $model, array $data):Model
    {
       return $model::create($data);
    }

    public function read(object $model, string $id):Model
    {
      return $model::whereId($id)->first();
    }

    public function update(object $model, array $data):object
    {
        $model->update($data);
        return $model;
    }

    public function delete(object $model)
    {
        $model->delete();
    }
}
