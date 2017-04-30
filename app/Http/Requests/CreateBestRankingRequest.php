<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBestRankingRequest extends FormRequest {

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
            'godstaffs_id' => 'required|unique:bestranking,godstaffs_id,NULL,id,deleted_at,NULL',
            'ranking_id' => 'required|unique:bestranking,ranking_id,NULL,id,deleted_at,NULL',
		];
	}
}
