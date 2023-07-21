<?php


namespace App\Modules\Carts\ViewModels;

use App\Modules\Carts\Model\Cart;
use Illuminate\Contracts\Support\Arrayable;

class GetAllCartsVM implements Arrayable
{
    public function toArray()
    {
        return Cart::query()->get();
    }
}
