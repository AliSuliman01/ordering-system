<?php


namespace App\Modules\Products\Requests;


use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
			'name'				=> 'string|required_without:number' ,
			'number'				=> 'string|required_without:name' ,
			'description'				=> 'string|nullable' ,
			'photo_path'				=> 'string|nullable' ,
			'category_id'				=> 'integer|nullable' ,
        ];
    }
}
