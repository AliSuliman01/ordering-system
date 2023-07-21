<?php


namespace App\Modules\Tables\Requests;


use Illuminate\Foundation\Http\FormRequest;

class UpdateTableRequest extends FormRequest
{
    public function rules(): array
    {
        return [
			'id'				=> 'integer|required' ,
			'name'				=> 'string|required' ,
			'number'				=> 'integer|required' ,
			'location'				=> 'string|required' ,
			'is_reserved'				=> 'boolean|required' ,

        ];
    }
}
