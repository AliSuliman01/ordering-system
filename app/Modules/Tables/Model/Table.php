<?php

namespace App\Modules\Tables\Model;

use App\Enums\OrderStatusEnum;
use App\Modules\Orders\Model\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Table extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_user_id',
        'updated_by_user_id',
        'deleted_by_user_id',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function active_order()
    {
        return $this->hasOne(Order::class)->where('status', '=', OrderStatusEnum::ACTIVE());
    }
}
