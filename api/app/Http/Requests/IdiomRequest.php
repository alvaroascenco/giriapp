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
            'expressao_pt' => 'required|max:250|regex:/^[A-Za-zÀ-ÖØ-öø-ÿçÇ\-\,\.\(\)\s]{2,}$/',
            'expressao_en' => 'required|max:250|regex:/^[A-Za-z\'\-\,\.\(\)\s]{2,}$/',
        ];
    }

    public function messages(): array{
        return [
            'expressao_pt.regex' => "O campo de expressão em português só pode conter letras, hífens, vírgulas e pontos",
            'expressao_en.regex' => 'O campo de expressão em inglês só pode conter letras, hífens, vírgulas e pontos'
        ];
    }
}
