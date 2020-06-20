<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstimateUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'course_id' => 'required|integer|exists:courses,id',
            'work_type_id' => 'required|integer|exists:work_types,id',
            'image_id' => 'required|integer|exists:images,id',
            'customer_id' => 'required|integer|exists:customers,id',
            'delivery_date' => 'required|date',
            'delivery_hour' => 'required',
            'description' => 'string|max:2000',
            'theme' => 'string',
            'sheets_number' => 'string',
            'standard' => 'string',
            'other_course' => 'string',
            'other_work_type' => 'string',
        ];
    }
}
