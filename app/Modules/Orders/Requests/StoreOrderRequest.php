<?php


namespace App\Modules\Orders\Requests;


use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
			'notes'				=> 'string|required' ,
			'table_id'				=> 'integer|required|exists:tables,id,deleted_at,NULL' ,
        ];
    }
}
