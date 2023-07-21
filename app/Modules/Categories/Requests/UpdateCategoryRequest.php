<?php


namespace App\Modules\Categories\Requests;


use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
			'id'				=> 'integer|required' ,
			'name'				=> 'string|required' ,
			'description'				=> 'string|required' ,
			'photo_path'				=> 'string|required' ,

        ];
    }
}
