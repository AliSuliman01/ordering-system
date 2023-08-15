<?php


namespace App\Modules\Products\Requests;


use App\Enums\ProductTypeEnum;
use BenSampo\Enum\Rules\Enum;
use App\Http\Requests\ApiFormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'name'				=> 'string|required_without:number' ,
            'number'				=> 'string|required_without:name' ,
            'price'				=> 'required|numeric' ,
            'type'				=> ['required'] ,
            'description'				=> 'string|nullable' ,
            'photo_path'				=> 'string|nullable' ,
            'category_id'				=> 'integer|nullable' ,
        ];
    }
}
