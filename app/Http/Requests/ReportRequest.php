<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class ReportRequest extends Request
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
	        'category_id'       => 'required',
	        'published_at'      => 'required',
	        //'meta_title[ua]'    => 'required|max:80',
	        //'meta_description'  => 'required|max:200',
	        //'meta_keywords'     => 'required|max:250',
	        //'title'             => 'required|max:255',
	        //'description'       => 'required|max:128',
	        //'file'              => 'required|max:255'
        ];
    }
}
