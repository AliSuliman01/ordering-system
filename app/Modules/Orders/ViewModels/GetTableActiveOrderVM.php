<?php


namespace App\Modules\Orders\ViewModels;

use App\Enums\OrderStatusEnum;
use App\Modules\Orders\Model\Order;
use Illuminate\Contracts\Support\Arrayable;

class GetTableActiveOrderVM implements Arrayable
{

    private $tableId;

    public function __construct($tableId)
    {
        $this->tableId = $tableId;
    }

    public function toArray()
    {
        return Order::query()
            ->where('table_id', $this->tableId)
            ->where('status', OrderStatusEnum::ACTIVE())
            ->first();
    }
}
