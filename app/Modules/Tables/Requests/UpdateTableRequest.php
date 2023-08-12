<?php


namespace App\Modules\Tables\Requests;


use App\Http\Requests\ApiFormRequest;

class UpdateTableRequest extends ApiFormRequest
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
