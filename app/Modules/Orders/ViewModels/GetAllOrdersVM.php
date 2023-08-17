<?php


namespace App\Modules\Orders\ViewModels;

use App\Modules\Orders\Model\Order;
use Illuminate\Contracts\Support\Arrayable;

class GetAllOrdersVM implements Arrayable
{
    public function __construct(public $perPage)
    {
    }

    public function toArray()
    {
        return Order::with(['carts.product'])->paginate($this->perPage);
    }
}
