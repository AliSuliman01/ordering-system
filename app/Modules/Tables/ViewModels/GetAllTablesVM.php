<?php


namespace App\Modules\Tables\ViewModels;

use App\Modules\Tables\Model\Table;
use Illuminate\Contracts\Support\Arrayable;

class GetAllTablesVM implements Arrayable
{
    public function toArray()
    {
        return Table::with(['active_order.carts.product'])->get();
    }
}
