<?php

namespace App\Modules\Admin\ActionsCRUD;

use Illuminate\Database\Eloquent\Model;

class DeleteAction
{
    public function delete(object $model):Model
    {
       $object =  $model::delete();

       return  $object;
    }
}
