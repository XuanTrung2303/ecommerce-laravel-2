<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
        switch ($this->method()) {
            case "POST":
                return [
                    'name' => ['required', 'unique:tags']
                ];

            case "PUT":
            case "PATCH":
                return [
                    'name' => ['required', 'unique:tags,name,' . $this->route()->tag->id]
                ];
            default:
                break;
        }
    }
}