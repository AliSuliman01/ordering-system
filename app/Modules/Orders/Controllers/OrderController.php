<?php


namespace App\Modules\Orders\Controllers;


use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Modules\Orders\Model\Order;
use App\Modules\Orders\Actions\StoreOrderAction;
use App\Modules\Orders\Actions\DestroyOrderAction;
use App\Modules\Orders\Actions\UpdateOrderAction;
use App\Modules\Orders\DTO\OrderDTO;
use App\Modules\Orders\Requests\StoreOrderRequest;
use App\Modules\Orders\Requests\UpdateOrderRequest;
use App\Modules\Orders\ViewModels\GetOrderVM;
use App\Modules\Orders\ViewModels\GetAllOrdersVM;

class OrderController extends Controller
{
    public function __construct(){
//        $this->middleware('auth:api')->only(['store','update','destroy']);
    }
    public function index(){

        return response()->json(Response::success((new GetAllOrdersVM())->toArray()));
    }

    public function show(Order $order){

        return response()->json(Response::success((new GetOrderVM($order))->toArray()));
    }

    public function store(StoreOrderRequest $request){

        $data = $request->validated() ;

        $orderDTO = OrderDTO::fromRequest($data);

        $order = StoreOrderAction::execute($orderDTO);

        return response()->json(Response::success((new GetOrderVM($order))->toArray()));
    }

    public function update(Order $order, UpdateOrderRequest $request){

        $data = $request->validated() ;

        $orderDTO = OrderDTO::fromRequest($data);

        $order = UpdateOrderAction::execute($order, $orderDTO);

        return response()->json(Response::success((new GetOrderVM($order))->toArray()));
    }

    public function destroy(Order $order){

        return response()->json(Response::success(DestroyOrderAction::execute($order)));
    }

}
