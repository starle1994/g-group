<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGigoloRankingStaffRequest extends FormRequest {

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
            'ranking_id' => 'required|unique:gigolorankingstaff,ranking_id,NULL,id,deleted_at,NULL',
          	'godstaffs_id'=>'required',
		];
	}
}
