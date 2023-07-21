<?php


namespace App\Modules\Orders\ViewModels;

use App\Modules\Orders\Model\Order;
use Illuminate\Contracts\Support\Arrayable;

class GetOrderVM implements Arrayable
{

    private $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function toArray()
    {
        return  $this->order;
    }
}
