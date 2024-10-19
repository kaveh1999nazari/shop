<?php

namespace App\Http\Controllers\Cart;

use App\DataTransferObject\CartCreateDTO;
use App\Http\Controllers\Controller;
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


    public function createCart(Request $request)
    {
        $dto = new CartCreateDTO(
            $request->input('user_id') ?? null,
            $request->input('uuid') ?? null,
            $request->input('product_price_id'),
            $request->input('number', 1),
            $request->input('total_price') ?? 0,
        );
        $cart = $this->cartService->create($dto);
        return CartResource::make($cart);
    }


    public function deleteCart()
    {
        return $this->cartService->deleteCart();
    }
}
