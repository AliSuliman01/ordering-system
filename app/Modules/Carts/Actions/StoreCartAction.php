<?php

namespace App\Modules\Carts\Actions;

use App\Modules\Carts\Model\Cart;
use App\Modules\Carts\DTO\CartDTO;

class StoreCartAction
{
    public static function execute(
    CartDTO $cartDTO
    ){

        return Cart::create(array_null_filter($cartDTO->toArray()));
    }
}
