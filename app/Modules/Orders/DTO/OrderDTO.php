<?php


namespace App\Modules\Orders\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class OrderDTO extends DataTransferObject
{

	/* @var integer|null */
	public $id;
	/* @var integer|null */
	public $table_id;
	/* @var string|null */
	public $notes;
	/* @var string|null */
	public $status;


    public static function fromRequest($request)
    {
        return new self([
			'id'				=> $request['id'] ?? null ,
			'table_id'				=> $request['table_id'] ?? null ,
			'notes'				=> $request['notes'] ?? null ,
			'status'				=> $request['status'] ?? null ,
        ]);
    }
}
