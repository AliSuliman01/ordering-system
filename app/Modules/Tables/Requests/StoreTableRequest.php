<?php


namespace App\Modules\Tables\Requests;


use App\Http\Requests\ApiFormRequest;

class StoreTableRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
			'name'				=> 'string|nullable' ,
			'number'				=> 'integer|required' ,
			'location'				=> 'string|nullable' ,
			'is_reserved'				=> 'boolean|nullable' ,

        ];
    }
}
