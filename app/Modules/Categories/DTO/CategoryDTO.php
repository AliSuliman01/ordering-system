<?php


namespace App\Modules\Categories\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class CategoryDTO extends DataTransferObject
{

	/* @var integer|null */
	public $id;
	/* @var string|null */
	public $name;
	/* @var string|null */
	public $description;
	/* @var string|null */
	public $photo_path;


    public static function fromRequest($request)
    {
        return new self([
			'id'				=> $request['id'] ?? null ,
			'name'				=> $request['name'] ?? null ,
			'description'				=> $request['description'] ?? null ,
			'photo_path'				=> $request['photo_path'] ?? null ,

        ]);
    }
}
