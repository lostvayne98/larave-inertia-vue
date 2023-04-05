<?php

namespace App\Modules\Admin\Heroes\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class IncrementStoreRequest extends FormRequest
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
            'increment' => [
                Rule::in('life','energy','firewall','skill')
            ],
        ];

        if ($this->input('increment') == 'skill') {
            $rules['skill_id'] = [
              'required',
                Rule::exists('hero_amounts','id')

            ];

        }

        return $rules;
    }

}
