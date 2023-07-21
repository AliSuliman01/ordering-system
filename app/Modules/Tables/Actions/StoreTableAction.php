<?php

namespace App\Modules\Tables\Actions;

use App\Modules\Tables\Model\Table;
use App\Modules\Tables\DTO\TableDTO;

class StoreTableAction
{
    public static function execute(
    TableDTO $tableDTO
    ){

        return Table::create(array_null_filter($tableDTO->toArray()));
    }
}
