<?php

namespace App\Modules\Admin\CrudService;

use Illuminate\Database\Eloquent\Model;

interface CrudInterface
{
    public function create(object $model,array $data):Model;

    public function read(object $model,string $id):Model;

    public function update(object $model,array $data):Model;

    public function delete(object $model);


}
