<?php

namespace App\Modules\Carts\Actions;

use App\Modules\Carts\Model\Cart;
use App\Modules\Carts\DTO\CartDTO;

class UpdateCartAction
{
    public static function execute(
        Cart $cart,CartDTO $cartDTO
    ){
        $cart->update(array_null_filter($cartDTO->toArray()));
        return $cart;
    }
}
