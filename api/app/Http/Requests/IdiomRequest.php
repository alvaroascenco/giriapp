<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class IdiomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'expressao_pt' => 'required|max:100|regex:/^[A-Za-zÀ-ÖØ-öø-ÿçÇ\-\s]{2,}$/',
            'expressao_en' => 'required|max:100|regex:/^[A-Za-z\'\-\s]{2,}$/',
        ];
    }
}
