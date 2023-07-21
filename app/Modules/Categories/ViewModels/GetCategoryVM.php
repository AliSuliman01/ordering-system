<?php


namespace App\Modules\Categories\ViewModels;

use App\Modules\Categories\Model\Category;
use Illuminate\Contracts\Support\Arrayable;

class GetCategoryVM implements Arrayable
{

    private $category;

    public function __construct($category)
    {
        $this->category = $category;
    }

    public function toArray()
    {
        return  $this->category;
    }
}
