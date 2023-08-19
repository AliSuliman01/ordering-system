<?php


namespace App\Modules\Orders\ViewModels;

use App\Modules\Orders\Model\Order;
use Illuminate\Contracts\Support\Arrayable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class GetAllOrdersVM implements Arrayable
{
    public function __construct(public $perPage)
    {
    }

    public function toArray()
    {
        return QueryBuilder::for(Order::class)
                ->allowedFilters(AllowedFilter::scope('created_before'),AllowedFilter::scope('created_after'))
                ->with(['carts.product'])
                ->paginate($this->perPage);
    }
}
