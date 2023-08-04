<?php


namespace App\Modules\Carts\Requests;


use Illuminate\Foundation\Http\FormRequest;

class StoreCartRequest extends FormRequest
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
