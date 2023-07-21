<?php


namespace App\Modules\Carts\Requests;


use Illuminate\Foundation\Http\FormRequest;

class UpdateCartRequest extends FormRequest
{
    public function rules(): array
    {
        return [
			'id'				=> 'integer|required' ,
			'product_id'				=> 'integer|required' ,
			'notes'				=> 'string|required' ,
			'amount'				=> 'integer|required' ,
			'price'				=> 'numeric|required' ,

        ];
    }
}
