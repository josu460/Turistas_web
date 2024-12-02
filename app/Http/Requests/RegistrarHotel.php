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
            'checkin' => 'required|date',
            'checkout' => 'required|date|after:checkin',
            'no_habitaciones' => 'required|integer|min:1',
            'calificacion' => 'required|integer|min:1|max:5',
            'precio' => 'required|numeric|min:0',
            'ubicacion' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'nullable|image|max:2048',
        ];
        
    }
}
