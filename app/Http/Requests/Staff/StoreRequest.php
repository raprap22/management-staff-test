<?php

namespace App\Http\Requests\Staff;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('staff-store');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            'department_name' => ['required'],
            'position' => ['required'],
            'phone_number' => ['required'],
            'currency' => ['required'],
            'salary' => ['required'],
            'resume' => ['required', 'file', 'mimes:pdf'],
        ];
    }
}
