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
        $rules = [
            'decrement' => [
                Rule::in('life','energy','firewall','skill')
            ],
        ];

        if ($this->input('decrement') == 'skill') {
            $rules['skill_id'] = [
                'required',
                Rule::exists('hero_amounts','id')

            ];

        }

        return $rules;
    }
}
