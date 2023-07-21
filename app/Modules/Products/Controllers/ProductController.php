<?php


namespace App\Modules\Products\Controllers;


use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Modules\Products\Model\Product;
use App\Modules\Products\Actions\StoreProductAction;
use App\Modules\Products\Actions\DestroyProductAction;
use App\Modules\Products\Actions\UpdateProductAction;
use App\Modules\Products\DTO\ProductDTO;
use App\Modules\Products\Requests\StoreProductRequest;
use App\Modules\Products\Requests\UpdateProductRequest;
use App\Modules\Products\ViewModels\GetProductVM;
use App\Modules\Products\ViewModels\GetAllProductsVM;

class ProductController extends Controller
{
    public function __construct(){
//        $this->middleware('auth:api')->only(['store','update','destroy']);
    }
    public function index(){

        return response()->json(Response::success((new GetAllProductsVM())->toArray()));
    }

    public function show(Product $product){

        return response()->json(Response::success((new GetProductVM($product))->toArray()));
    }

    public function store(StoreProductRequest $request){

        $data = $request->validated() ;

        $productDTO = ProductDTO::fromRequest($data);

        $product = StoreProductAction::execute($productDTO);

        return response()->json(Response::success((new GetProductVM($product))->toArray()));
    }

    public function update(Product $product, UpdateProductRequest $request){

        $data = $request->validated() ;

        $productDTO = ProductDTO::fromRequest($data);

        $product = UpdateProductAction::execute($product, $productDTO);

        return response()->json(Response::success((new GetProductVM($product))->toArray()));
    }

    public function destroy(Product $product){

        return response()->json(Response::success(DestroyProductAction::execute($product)));
    }

}
