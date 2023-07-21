<?php


namespace App\Modules\Tables\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class TableDTO extends DataTransferObject
{

	/* @var integer|null */
	public $id;
	/* @var string|null */
	public $name;
	/* @var integer|null */
	public $number;
	/* @var string|null */
	public $location;
	/* @var boolean|null */
	public $is_reserved;


    public static function fromRequest($request)
    {
        return new self([
			'id'				=> $request['id'] ?? null ,
			'name'				=> $request['name'] ?? null ,
			'number'				=> $request['number'] ?? null ,
			'location'				=> $request['location'] ?? null ,
			'is_reserved'				=> $request['is_reserved'] ?? null ,

        ]);
    }
}
