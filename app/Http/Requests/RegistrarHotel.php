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

    /**
     * Reglas de validación para el formulario.
     */
    public function rules()
    {
        return [
            'nombreHotel' => 'required|string|max:255',
            'categoria' => 'required|in:Economico,Medio,Lujo',
            'precio' => 'required|numeric|min:0',
            'servicios' => 'required|string',
            'distancia' => 'required|numeric|min:0',
            'estrellas' => 'required|integer|between:1,5',
        ];
    }
}
