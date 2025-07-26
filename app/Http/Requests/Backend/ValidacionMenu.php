<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionMenu extends FormRequest
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
            'mnu_texto' => 'required|max:50|unique:sw_menu,mnu_texto,' . $this->route('id'),
            'mnu_url' => 'required|max:100',
            'mnu_icono' => 'nullable|max:50',
        ];
    }

    public function messages(): array
    {
        return [
            'mnu_texto.required' => 'El campo texto es obligatorio.',
            'mnu_texto.max' => 'El campo texto no debe exceder los 50 caracteres.',
            'mnu_texto.unique' => 'El texto del menú ya existe.',
            'mnu_url.required' => 'El campo URL es obligatorio.',
            'mnu_url.max' => 'El campo URL no debe exceder los 100 caracteres.',
            'mnu_icono.max' => 'El campo icono no debe exceder los 50 caracteres.',
        ];
    }
}
