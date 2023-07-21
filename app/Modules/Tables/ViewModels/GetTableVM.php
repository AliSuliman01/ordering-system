<?php


namespace App\Modules\Tables\ViewModels;

use App\Modules\Tables\Model\Table;
use Illuminate\Contracts\Support\Arrayable;

class GetTableVM implements Arrayable
{

    private $table;

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function toArray()
    {
        return  $this->table;
    }
}
