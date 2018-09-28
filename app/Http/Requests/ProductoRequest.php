<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
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
            'descripcion_larga' => 'required',
            'descripcion_corta' => 'required',
            'modelo' => 'required',
            'marca' => 'required',
            'tipo_parte_id' => 'required',
            'codigo_barras' => 'required',
            'numero_parte' => 'required',
            'stock_id' => 'required',

        ];
    }
}
