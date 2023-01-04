<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteFormRequest extends FormRequest
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
        $re = 'nullable|string';
        return [
            'website_name' => $re,
            'website_url' => $re,
            'website_title' => $re,
            'website_keyword' => $re,
            'website_description' => $re,
            'address' => $re,
            'phone1' => $re,
            'phone2' => $re,
            'email1' => $re,
            'email2' => $re,
            'facebook' => $re,
            'twitter' => $re,
            'youtube' => $re,
            'instagram' => $re
        ];
    }
}
