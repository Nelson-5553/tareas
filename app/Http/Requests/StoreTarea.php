<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTarea extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
             "name"=> "required|max:20",
            "descripcion"=>"required",
            "id_category"=>"required"
        ];
    }
    public function messages(): array
    {
        return [
            'descripcion.required' => 'El campo Descripcion es obligatorio',
            'id_category'=>'El campo Categoria es obligatorio'
        ];
    }
    public function attributes(): array
    {
        return [
            'name'=> 'Nombre de la tarea',
        ];
}
}
