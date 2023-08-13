<?php

namespace App\Modules\Orders\Requests;

use App\Http\Requests\ApiFormRequest;

class AddToOrderRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
			'table_id'				=> 'integer|required|exists:tables,id,deleted_at,NULL',
			'carts'				=> ['required', 'array'] ,
            'carts.*.product_id' => ['required' , 'exists:products,id,deleted_at,NULL'],
            'carts.*.amount' => ['required' , 'min:1'],
            'carts.*.notes' => ['nullable' , 'string'],
        ];
    }
}
