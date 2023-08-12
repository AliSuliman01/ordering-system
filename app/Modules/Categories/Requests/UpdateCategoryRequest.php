<?php


namespace App\Modules\Categories\Requests;


use App\Http\Requests\ApiFormRequest;

class UpdateCategoryRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
			'name'				=> 'string|required' ,
			'description'				=> 'string|required' ,
			'photo_path'				=> 'string|required' ,

        ];
    }
}
