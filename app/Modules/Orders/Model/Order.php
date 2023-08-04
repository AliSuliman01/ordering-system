<?php

namespace App\Modules\Orders\Model;

use App\Modules\Carts\Model\Cart;
use App\Modules\Products\Model\Product;
use App\Modules\Tables\Model\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    const ACTIVE = 'active';
    const PAID = 'paid';
    const EXPIRED = 'expired';
    const CANCELED = 'canceled';

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


    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }
}