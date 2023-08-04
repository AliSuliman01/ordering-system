<?php

namespace App\Modules\Carts\Actions;

use App\Modules\Carts\Model\Cart;
use App\Modules\Carts\DTO\CartDTO;

class StoreCartAction
{
    public static function execute(
        CartDTO $cartDTO
    ){
        $cart = new Cart(array_null_filter($cartDTO->toArray()));
        $cart->price = $cart->product->price;
        $cart->save();

        return ;
    }
}
