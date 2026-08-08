<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'required',
                'string',
            ],

            'category_id' => [
                'required',
                'integer',
                'exists:categories,id',
            ],

            'tags' => [
                'required',
                'array',
                'min:1',
            ],

            'tags.*' => [
                'integer',
                'distinct',
                'exists:tags,id',
            ],

            'is_completed' => [
                'required',
                'boolean',
            ],
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'El título es obligatorio.',
            'title.max' => 'El título no puede superar los 255 caracteres.',

            'description.required' => 'La descripción es obligatoria.',

            'category_id.required' => 'Debes seleccionar una categoría.',
            'category_id.exists' => 'La categoría seleccionada no existe.',

            'tags.required' => 'Debes seleccionar al menos una etiqueta.',
            'tags.min' => 'Debes seleccionar al menos una etiqueta.',
            'tags.*.distinct' => 'No puedes repetir una etiqueta.',
            'tags.*.exists' => 'Una de las etiquetas seleccionadas no existe.',

            'is_completed.required' => 'Debes seleccionar un estado.',
            'is_completed.boolean' => 'El estado seleccionado no es válido.',
        ];
    }
}
