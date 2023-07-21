<?php

namespace App\Modules\Orders\Actions;

use App\Modules\Orders\Model\Order;
use App\Modules\Orders\DTO\OrderDTO;

class UpdateOrderAction
{
    public static function execute(
        Order $order,OrderDTO $orderDTO
    ){
        $order->update(array_null_filter($orderDTO->toArray()));
        return $order;
    }
}
