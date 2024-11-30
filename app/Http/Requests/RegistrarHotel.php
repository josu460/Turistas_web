<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrarHotel extends FormRequest
{
     /**
     * Determina si el usuario está autorizado para realizar esta solicitud.
     */
    public function authorize()
    {
        return true; // Cambiar a `false` si se desea restringir acceso
    }

    /**x
     * Reglas de validación para el formulario.
     */
    public function rules()
    {
        return [
            'hotel' => 'required|string|max:255',
            'no_habitaciones' => 'required|integer|min:1',
            'calificacion' => 'nullable|integer|between:1,5',
            'precio' => 'required|numeric|min:0',
            'ubicacion' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'politicas_cancelacion' => 'nullable|string',
        ];
        
    }
}
