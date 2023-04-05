<?php

namespace App\Modules\Admin\Heroes\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
class DecrementRequest extends  FormRequest
{

    public function authorize()
    {
        if ($this->user()->role('admin') || $this->user()->role('super_admin')) {
            return true;
        } else {
            dd('Вы не супер Админ');
        }
    }


    public function rules()
    {
        return [
            'decrement' => [
                Rule::in('life','energy','firewall')
            ]
        ];
    }
}
