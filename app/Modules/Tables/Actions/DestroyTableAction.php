<?php

namespace App\Modules\Tables\Actions;

use App\Modules\Tables\Model\Table;

class DestroyTableAction
{
    public static function execute(
        Table $table
    ){
        $table->delete();
        return $table;
    }
}
