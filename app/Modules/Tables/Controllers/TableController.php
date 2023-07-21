<?php


namespace App\Modules\Tables\Controllers;


use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Modules\Tables\Model\Table;
use App\Modules\Tables\Actions\StoreTableAction;
use App\Modules\Tables\Actions\DestroyTableAction;
use App\Modules\Tables\Actions\UpdateTableAction;
use App\Modules\Tables\DTO\TableDTO;
use App\Modules\Tables\Requests\StoreTableRequest;
use App\Modules\Tables\Requests\UpdateTableRequest;
use App\Modules\Tables\ViewModels\GetTableVM;
use App\Modules\Tables\ViewModels\GetAllTablesVM;

class TableController extends Controller
{
    public function __construct(){
//        $this->middleware('auth:api')->only(['store','update','destroy']);
    }
    public function index(){

        return response()->json(Response::success((new GetAllTablesVM())->toArray()));
    }

    public function show(Table $table){

        return response()->json(Response::success((new GetTableVM($table))->toArray()));
    }

    public function store(StoreTableRequest $request){

        $data = $request->validated() ;

        $tableDTO = TableDTO::fromRequest($data);

        $table = StoreTableAction::execute($tableDTO);

        return response()->json(Response::success((new GetTableVM($table))->toArray()));
    }

    public function update(Table $table, UpdateTableRequest $request){

        $data = $request->validated() ;

        $tableDTO = TableDTO::fromRequest($data);

        $table = UpdateTableAction::execute($table, $tableDTO);

        return response()->json(Response::success((new GetTableVM($table))->toArray()));
    }

    public function destroy(Table $table){

        return response()->json(Response::success(DestroyTableAction::execute($table)));
    }

}
