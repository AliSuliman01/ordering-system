<?php


namespace App\Modules\Orders\ViewModels;

use App\Modules\Orders\Model\Order;
use Illuminate\Contracts\Support\Arrayable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class GetOrdersTotalVM implements Arrayable
{
    public function toArray()
    {
        return QueryBuilder::for(Order::class)
            ->allowedFilters(AllowedFilter::scope('created_before'), AllowedFilter::scope('created_after'))
            ->with(['carts'])
            ->get()
            ->reduce(function ($total, $order) {
                return $total + $order->carts->reduce(function ($orderTotal, $cart) {
                        return $orderTotal + ($cart->price * $cart->amount);
                    });

            });
    }
}
