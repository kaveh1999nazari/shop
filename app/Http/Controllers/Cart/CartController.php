<?php

namespace App\Http\Controllers\Cart;

use App\DataTransferObject\CartCreateDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\CartCreateRequest;
use App\Http\Resources\CartResource;
use App\Service\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function __construct(protected readonly CartService $cartService){}

    public function listCart()
    {
        $uuid = request()->header('uuid');
        $cart = $this->cartService->listCart($uuid);
        return CartResource::collection($cart);
    }


    public function createCart(CartCreateRequest $request)
    {
        $data = $request->validated();
        $dto = CartCreateDTO::fromArray($data);
        $cart = $this->cartService->create($dto);
        return CartResource::make($cart);
    }


    public function deleteCart()
    {
        return $this->cartService->deleteCart();
    }
}
