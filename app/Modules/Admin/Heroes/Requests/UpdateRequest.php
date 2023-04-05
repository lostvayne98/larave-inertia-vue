<?php

namespace App\Modules\Admin\Heroes\Requests;

use Illuminate\Foundation\Http\FormRequest;
class UpdateRequest extends FormRequest
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
            'name' => 'nullable | max:50',
            'user_id' => 'exists:App\Modules\Admin\Heroes\Models\User,id | nullable',
            'faculty' => 'String | nullable',
            'course' => 'String  | nullable',
            'rank' => 'String | nullable' ,
            'photo' => 'image | nullable',
            'combat_skills' => 'nullable',
            'hack_skills' => 'nullable',
        ];

       return $rules;
    }
}
