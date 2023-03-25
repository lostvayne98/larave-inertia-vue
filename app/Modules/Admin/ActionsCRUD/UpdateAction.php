<?php

namespace App\Modules\Admin\ActionsCRUD;

use Illuminate\Database\Eloquent\Model;

class UpdateAction
{
    public function update(object $model,array $data):Model
    {
      $object =  $model::update($data);

      return $object;
    }
}
