<?php


namespace App\Modules\Orders\Requests;


use App\Http\Requests\ApiFormRequest;

class UpdateOrderRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
			'notes'				=> 'string|required' ,
            'table_id'				=> 'integer|required|exists:tables,id,deleted_at,NULL' ,
        ];
    }
}
