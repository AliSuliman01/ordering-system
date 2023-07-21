<?php


namespace App\Modules\Carts\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class CartDTO extends DataTransferObject
{

	/* @var integer|null */
	public $id;
	/* @var integer|null */
	public $product_id;
	/* @var integer|null */
	public $order_id;
	/* @var string|null */
	public $notes;
	/* @var integer|null */
	public $amount;
	/* @var float|null */
	public $price;


    public static function fromRequest($request)
    {
        return new self([
			'id'				=> $request['id'] ?? null ,
			'product_id'				=> $request['product_id'] ?? null ,
			'order_id'				=> $request['order_id'] ?? null ,
			'notes'				=> $request['notes'] ?? null ,
			'amount'				=> $request['amount'] ?? null ,
			'price'				=> $request['price'] ?? null ,

        ]);
    }
}
