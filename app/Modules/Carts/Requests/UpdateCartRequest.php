<?php


namespace App\Modules\Carts\Requests;


use App\Http\Requests\ApiFormRequest;

class UpdateCartRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
			'product_id'				=> 'integer|required' ,
			'notes'				=> 'string|required' ,
			'amount'				=> 'integer|required' ,
			'price'				=> 'numeric|required' ,

        ];
    }
}
