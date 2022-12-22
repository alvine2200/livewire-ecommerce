<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderFormRequest extends FormRequest
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
        $data = 'required|string';
        return [
            'title' => $data,
            'description' => 'nullable',
            'image' => "nullable|mimes:jpeg,jpg,png,svg,pdf|max:7000",
            'status' => 'nullable',
        ];
    }
}
