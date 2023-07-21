<?php

namespace App\Modules\Tables\Actions;

use App\Modules\Tables\Model\Table;
use App\Modules\Tables\DTO\TableDTO;

class UpdateTableAction
{
    public static function execute(
        Table $table,TableDTO $tableDTO
    ){
        $table->update(array_null_filter($tableDTO->toArray()));
        return $table;
    }
}
