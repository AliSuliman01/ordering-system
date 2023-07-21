<?php

namespace App\Modules\Orders\Actions;

use App\Modules\Orders\Model\Order;
use App\Modules\Orders\DTO\OrderDTO;

class StoreOrderAction
{
    public static function execute(
    OrderDTO $orderDTO
    ){

        return Order::create(array_null_filter($orderDTO->toArray()));
    }
}
