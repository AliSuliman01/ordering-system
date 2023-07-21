<?php


namespace App\Modules\Tables\Requests;


use Illuminate\Foundation\Http\FormRequest;

class StoreTableRequest extends FormRequest
{
    public function rules(): array
    {
        return [
			'name'				=> 'string|required' ,
			'number'				=> 'integer|required' ,
			'location'				=> 'string|required' ,
			'is_reserved'				=> 'boolean|required' ,

        ];
    }
}
