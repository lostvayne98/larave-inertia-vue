<?php

namespace App\Modules\Admin\User\Filter;

use App\Filter\abstractFilter;
use Illuminate\Database\Eloquent\Builder;

class UserFilter extends abstractFilter
{
    public const ORDER_BY = 'orderBy';
    public const CONTENT = 'content';
    public const CATEGORY_ID = 'category_id';


    protected function getCallbacks(): array
    {
        return [
            self::ORDER_BY => [$this, 'order_by'],
            /*self::CONTENT => [$this, 'content'],
            self::CATEGORY_ID => [$this, 'categoryId'],*/
        ];
    }

    public function order_by(Builder $builder, $value)
    {
        if ($value == '1') {

            $builder->orderByDesc('id');
        } else {

            $builder->orderBy('id');
        }
    }

    /*public function content(Builder $builder, $value)
    {
        $builder->where('content', 'like', "%{$value}%");
    }

    public function categoryId(Builder $builder, $value)
    {
        $builder->where('category_id', $value);
    }*/
}
