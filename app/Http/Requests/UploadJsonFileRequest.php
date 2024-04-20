<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadJsonFileRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'file' => [
                'required',
                'file',
                'max:8192',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/\.json$/', $value->getClientOriginalName())) {
                        $fail('The :attribute must have a .json extension.');
                    }
                },
            ],
        ];
    }
}
