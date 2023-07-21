<?php


namespace App\Modules\Carts\Controllers;


use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Modules\Carts\Model\Cart;
use App\Modules\Carts\Actions\StoreCartAction;
use App\Modules\Carts\Actions\DestroyCartAction;
use App\Modules\Carts\Actions\UpdateCartAction;
use App\Modules\Carts\DTO\CartDTO;
use App\Modules\Carts\Requests\StoreCartRequest;
use App\Modules\Carts\Requests\UpdateCartRequest;
use App\Modules\Carts\ViewModels\GetCartVM;
use App\Modules\Carts\ViewModels\GetAllCartsVM;

class CartController extends Controller
{
    public function __construct(){
//        $this->middleware('auth:api')->only(['store','update','destroy']);
    }
    public function index(){

        return response()->json(Response::success((new GetAllCartsVM())->toArray()));
    }

    public function show(Cart $cart){

        return response()->json(Response::success((new GetCartVM($cart))->toArray()));
    }

    public function store(StoreCartRequest $request){

        $data = $request->validated() ;

        $cartDTO = CartDTO::fromRequest($data);

        $cart = StoreCartAction::execute($cartDTO);

        return response()->json(Response::success((new GetCartVM($cart))->toArray()));
    }

    public function update(Cart $cart, UpdateCartRequest $request){

        $data = $request->validated() ;

        $cartDTO = CartDTO::fromRequest($data);

        $cart = UpdateCartAction::execute($cart, $cartDTO);

        return response()->json(Response::success((new GetCartVM($cart))->toArray()));
    }

    public function destroy(Cart $cart){

        return response()->json(Response::success(DestroyCartAction::execute($cart)));
    }

}
