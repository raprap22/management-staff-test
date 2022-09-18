<?php

namespace App\Http\Requests\Staff;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('staff-update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['sometimes', 'required'],
            'department_name' => ['sometimes', 'required'],
            'position' => ['sometimes', 'required'],
            'phone_number' => ['sometimes', 'required'],
            'currency' => ['sometimes', 'required'],
            'salary' => ['sometimes', 'required'],
            'resume' => ['sometimes', 'nullable', 'file', 'mimes:pdf'],
        ];
    }
}
