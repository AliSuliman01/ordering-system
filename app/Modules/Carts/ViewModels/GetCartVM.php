<?php


namespace App\Modules\Carts\ViewModels;

use App\Modules\Carts\Model\Cart;
use Illuminate\Contracts\Support\Arrayable;

class GetCartVM implements Arrayable
{

    private $cart;

    public function __construct($cart)
    {
        $this->cart = $cart;
    }

    public function toArray()
    {
        return  $this->cart;
    }
}
