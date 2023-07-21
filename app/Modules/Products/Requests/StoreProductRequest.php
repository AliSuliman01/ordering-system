<?php


namespace App\Modules\Products\Requests;


use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
			'name'				=> 'string|required' ,
			'description'				=> 'string|required' ,
			'photo_path'				=> 'string|required' ,
			'category_id'				=> 'integer|required' ,

        ];
    }
}
