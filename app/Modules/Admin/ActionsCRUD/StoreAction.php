<?php

namespace App\Modules\Admin\ActionsCRUD;

use Illuminate\Database\Eloquent\Model;

class StoreAction
{
    public function store(object $model,array $data):Model
    {
      $object =  $model::create($data);

      return $object;
    }
}
