<?php


namespace App\Modules\Categories\ViewModels;

use App\Modules\Categories\Model\Category;
use Illuminate\Contracts\Support\Arrayable;

class GetAllCategorysVM implements Arrayable
{
    public function toArray()
    {
        return Category::query()->get();
    }
}
