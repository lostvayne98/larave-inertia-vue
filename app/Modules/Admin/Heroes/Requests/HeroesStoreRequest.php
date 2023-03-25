<?php

namespace App\Modules\Admin\Heroes\Requests;
use App\Modules\Admin\User\Models\User;
use \Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class HeroesStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::user()->role('admin') || Auth::user()->role('super_admin')) {
            return true;
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
            'name' => 'nullable | max:50',
            'user_id' => 'exists:App\Modules\Admin\Heroes\Models\User,id | nullable',
            'faculty' => 'String | nullable',
            'course' => 'String  | nullable',
            'rank' => 'String | nullable' ,
            'photo' => 'image | nullable',
            'combat_skills' => 'array | nullable',
            'hack_skills' => 'array | nullable',
        ];
    }


}
