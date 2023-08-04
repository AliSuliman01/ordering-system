<?php


namespace App\Modules\Categories\Requests;


use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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