<?php

namespace App\Modules\Carts\Actions;

use App\Modules\Carts\Model\Cart;

class DestroyCartAction
{
    public static function execute(
        Cart $cart
    ){
        $cart->delete();
        return $cart;
    }
}
