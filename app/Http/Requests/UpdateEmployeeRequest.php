<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => "email|unique:employees,email,".$this->employee->id,
            'password' => 'sometimes',
            'address' => 'required',
            'department' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zip_code' => 'required|numeric',
            'birthdate' => 'nullable|date',
            'date_hired' => 'nullable|date',
        ];
    }
}
