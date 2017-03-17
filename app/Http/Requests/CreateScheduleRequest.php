<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateScheduleRequest extends FormRequest {

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
            'name_event' => 'required', 
            'description' => 'required', 
            'start_time' => 'required', 
            'end_time' => 'required', 
            'image' => 'required', 
            'color' => 'required', 
            
		];
	}
}
