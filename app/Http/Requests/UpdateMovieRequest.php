<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest
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
            'name' => 'required',
            'year' => 'required|int|min:1800',
            'rating' => 'required|min:1|max:10',
            'actors' => 'required',
            'poster' => 'nullable|mimes:jpg,jpeg,png|max:8192',
            'trailer_link' => 'required',
            'genre_id' => 'required',
        ];
    }
}
