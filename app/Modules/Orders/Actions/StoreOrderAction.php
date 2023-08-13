<?php

namespace App\Modules\Orders\Actions;

use App\Enums\OrderStatusEnum;
use App\Modules\Orders\Model\Order;
use App\Modules\Orders\DTO\OrderDTO;

class StoreOrderAction
{
    public static function execute(
    OrderDTO $orderDTO
    ){
        Order::query()
            ->where('table_id', $orderDTO->table_id)
            ->where('status', OrderStatusEnum::ACTIVE())
            ->update([
                'status' => OrderStatusEnum::EXPIRED()
            ]);

        $orderDTO->status = OrderStatusEnum::ACTIVE();
        return Order::create(array_null_filter($orderDTO->toArray()));
    }
}
