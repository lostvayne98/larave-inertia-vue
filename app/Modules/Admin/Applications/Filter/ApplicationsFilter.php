<?php

namespace App\Modules\Admin\Applications\Filter;
use App\Filter\abstractFilter;
class ApplicationsFilter extends abstractFilter
{
    public const TYPE = 'type';

    protected function getCallbacks(): array
    {
        return  [

        ];
    }
}
