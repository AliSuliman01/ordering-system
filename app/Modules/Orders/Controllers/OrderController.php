<?php


namespace App\Modules\Orders\Controllers;


use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Jobs\PrintCartsJob;
use App\Modules\Orders\Model\Order;
use App\Modules\Orders\Actions\StoreOrderAction;
use App\Modules\Orders\Actions\DestroyOrderAction;
use App\Modules\Orders\Actions\UpdateOrderAction;
use App\Modules\Orders\DTO\OrderDTO;
use App\Modules\Orders\Requests\AddToOrderRequest;
use App\Modules\Orders\Requests\StoreOrderRequest;
use App\Modules\Orders\Requests\UpdateOrderRequest;
use App\Modules\Orders\ViewModels\GetOrdersTotalVM;
use App\Modules\Orders\ViewModels\GetOrderVM;
use App\Modules\Orders\ViewModels\GetAllOrdersVM;
use App\Modules\Orders\ViewModels\GetTableActiveOrderVM;
use App\Modules\Products\Model\Product;
use App\Modules\Products\ViewModels\GetProductByIdVM;
use App\Modules\Products\ViewModels\GetProductVM;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function index()
    {

        return response()->json(Response::success([
            'orders' => (new GetAllOrdersVM(request()->perPage)->toArray(),
            'total' => (new GetOrdersTotalVM())->toArray()
        ]));
    }

    public function show(Order $order)
    {

        return response()->json(Response::success((new GetOrderVM($order))->toArray()));
    }

    public function store(StoreOrderRequest $request)
    {

        $data = $request->validated();

        $orderDTO = OrderDTO::fromRequest($data);

        $order = StoreOrderAction::execute($orderDTO);

        return response()->json(Response::success((new GetOrderVM($order))->toArray()));
    }

    public function update(Order $order, UpdateOrderRequest $request)
    {

        $data = $request->validated();

        $orderDTO = OrderDTO::fromRequest($data);

        $order = UpdateOrderAction::execute($order, $orderDTO);

        return response()->json(Response::success((new GetOrderVM($order))->toArray()));
    }

    public function destroy(Order $order)
    {

        return response()->json(Response::success(DestroyOrderAction::execute($order)));
    }

    public function add_to_order(AddToOrderRequest $request)
    {
        $data = $request->validated();
        $order = (new GetTableActiveOrderVM($data['table_id']))->toArray();

        DB::transaction(function () use ($data, $order) {

            if (!$order) {
                $order = StoreOrderAction::execute(OrderDTO::fromRequest([
                    'table_id' => $data['table_id']
                ]));
            }

            foreach ($data['carts'] as &$cart) {
               $product = (new GetProductByIdVM($cart['product_id']))->toArray();
                $cart = [
                    'product_id' => $product->id,
                    'price' => $product->price,
                    'amount' => $cart['amount'],
                    'notes' => $cart['notes'],
                ];
                $order->carts()->create($cart);
            }
        });

        dispatch(new PrintCartsJob($order->id, $data['carts']));

        return \response()->json(Response::success($order->load(['carts.product', 'table'])));
    }
}
