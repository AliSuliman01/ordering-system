<?php


namespace App\Modules\Products\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class ProductDTO extends DataTransferObject
{

	/* @var integer|null */
	public $id;
	/* @var string|null */
	public $name;
	/* @var string|null */
	public $number;
	/* @var string|null */
	public $type;
	/* @var float|null */
	public $price;
	/* @var string|null */
	public $description;
	/* @var string|null */
	public $photo_path;
	/* @var integer|null */
	public $category_id;


    public static function fromRequest($request)
    {
        return new self([
			'id'				=> $request['id'] ?? null ,
			'name'				=> $request['name'] ?? null ,
			'number'				=> $request['number'] ?? null ,
			'price'				=> $request['price'] ?? null ,
			'type'				=> $request['type'] ?? null ,
			'description'				=> $request['description'] ?? null ,
			'photo_path'				=> $request['photo_path'] ?? null ,
			'category_id'				=> $request['category_id'] ?? null ,

        ]);
    }
}
