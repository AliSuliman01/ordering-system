<?php


namespace App\Modules\Products\Requests;


use App\Enums\ProductTypeEnum;
use BenSampo\Enum\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'				=> 'string|required_without:number' ,
            'number'				=> 'string|required_without:name' ,
            'price'				=> 'required|numeric' ,
            'type'				=> ['required', new Enum(ProductTypeEnum::class)] ,
            'description'				=> 'string|nullable' ,
            'photo_path'				=> 'string|nullable' ,
            'category_id'				=> 'integer|nullable' ,
        ];
    }
}
