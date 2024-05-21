<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
            'name' => 'required',
            'task_priority_id' => 'required|integer'
        ];
    }

    public function messages() : array
    {
        return [
            'name.required' => 'Name is required',
            'task_priority_id.required' => 'Task Priority is required',
            'task_priority_id.integer' => 'Task Priority should be integer only'
        ];
    }
}
