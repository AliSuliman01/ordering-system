<?php

namespace App\Modules\Carts\Requests;

use App\Http\Requests\ApiFormRequest;

class StoreCartRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
			'order_id'				=> 'integer|required' ,
			'product_id'				=> 'integer|required' ,
			'notes'				=> 'string|nullable' ,
			'amount'				=> 'integer|required' ,
        ];
    }
}
