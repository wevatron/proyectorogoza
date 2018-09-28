<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedorRequest extends FormRequest
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
            'nombre' => 'required',
            'RFC' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'clave_interbancaria' => 'required',
            'cuenta' => 'required',
            'cuenta_debito' => 'required',
            'correo_electronico' => 'required',
            'banco' => 'required',
            'descripcion' => 'required',












        ];
    }
}
