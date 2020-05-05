<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome'  => 'nullable|min:3|max:255',
            'email' => 'required|min:5|max:100',
            'foto'  => 'nullable|image',
        ];
    }

    public function messages(){


        //sobrepõe as mensagens de erro do laravel
        return [
            'name.min'      =>'Caracteres insuficientes para Nome',
            'email.required'=>'Email não pode estar vazio'
        ];
    }

}
