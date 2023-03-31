<?php

namespace App\Modules\Admin\Skills\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SkillUpdateRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->user()->role('admin') || Auth::user()->role('super_admin')) {
            return true;
        } else {
            dd('Вы не супер Админ');
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required | max:50',
            'rarity' => 'required'
        ];
    }

}
