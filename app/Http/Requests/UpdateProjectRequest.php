<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'=> [
                'required',
                 'string',
                 Rule::unique('projects')->ignore($this->project->id)],
            'description'=> ['required', 'string'],
            'type_id'=> ['nullable', 'exists:types,id'],
            'technologies'=> ['nullable', 'exists:technologies,id'],
            'link'=> ['required', 'url'],
            'cover_image'=> ['nullable', 'image', 'max:512'],
        ];
    }

    public function messages() {
        return [
            'title.required'=> 'Il titolo è obbligatorio',
            'title.string'=> 'Il titolo deve essere una stringa',
            'title.unique'=> 'Il titolo del progetto è già esistente',

            'description.required'=> 'La descrizione è obbligatoria',
            'description.string'=> 'La descrizione deve essere una stringa',

            'link.required'=> 'Il link è obbligatorio',
            'link.string'=> 'Il link deve essere un URL',

            'type_id.exists' => 'La tipologia inserita non è valida',

            'technologies.exists' => 'La tecnologia inserita non è valida',

            'cover_image.image' => 'Il File caricato deve essere un\'immagine',
            'cover_image.max' => 'Il File caricato deve avere una dimensione inferiore a 512KB',
        ];
    }
}
