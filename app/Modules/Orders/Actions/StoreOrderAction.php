<?php

namespace App\Modules\Orders\Actions;

use App\Modules\Orders\Model\Order;
use App\Modules\Orders\DTO\OrderDTO;

class StoreOrderAction
{
    public static function execute(
    OrderDTO $orderDTO
    ){
        Order::query()
            ->where('table_id', $orderDTO->table_id)
            ->where('status', Order::ACTIVE)
            ->update([
                'status' => Order::EXPIRED
            ]);

        $orderDTO->status = Order::ACTIVE;
        return Order::create(array_null_filter($orderDTO->toArray()));
    }
}
