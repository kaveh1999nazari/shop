<?php

namespace App\Service;

use App\DataTransferObject\CartCreateDTO;
use App\Exceptions\CartEmpty;
use App\Exceptions\NotFoundProduct;
use App\Models\Cart;
use App\Repository\CartRepository;
use App\Repository\ProductPriceRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CartService
{

    function __construct(
        protected readonly CartRepository         $cartRepository,
        protected readonly ProductPriceRepository $productPriceRepository
    )
    {
    }

    public function listCart($uuid): Collection
    {
        $carts = $this->cartRepository->getCartByUser() ?? $this->cartRepository->getCartByUuid($uuid);
        if ($carts->isEmpty()) {
            throw new CartEmpty();
        }
        return $carts;
    }

    public function create(CartCreateDTO $cartCreateDTO): Cart
    {
        if (Auth::check()) {
            $userId = Auth()->id();
            $uuid = null;
        } else {
            $userId = null;
            $uuid = request()->header('uuid') ?? Str::uuid()->toString();
        }

        $product = $this->productPriceRepository->getById($cartCreateDTO->productPriceId) ?? throw new NotFoundProduct();
        $totalPrice = $product->price * $cartCreateDTO->number;

        return $this->cartRepository->create([
            'user_id' => $userId,
            'uuid' => $uuid,
            'product_price_id' => $cartCreateDTO->productPriceId,
            'number' => $cartCreateDTO->number,
            'total_price' => $totalPrice,
        ]);
    }


    public function deleteCart()
    {
        if (Auth::check()) {
            $userId = Auth()->id();
            $uuid = null;
            return $this->cartRepository->deleteCartByUser($userId);
        } else {
            $userId = null;
            $uuid = request()->header('uuid');
            return $this->cartRepository->deleteCartByUuid($uuid);
        }
    }
}
