<?php

namespace App\Modules\Admin\CrudService;

use Illuminate\Database\Eloquent\Model;

class CrudRepository implements CrudInterface
{

    public function create(object $model, array $data):Model
    {
       return $model::create($data);
    }

    public function read(object $model, string $id):Model
    {
      return $model::where('id',$id)->first();
    }

    public function update(object $model, array $data):Model
    {
        return $model::update($data);
    }

    public function delete(object $model)
    {
        $model::delete();
    }
}
