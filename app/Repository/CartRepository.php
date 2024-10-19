<?php

namespace App\Repository;

use App\Exceptions\NotFoundProduct;
use App\Models\Cart;
use App\Models\Product;
use http\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\Auth;

class CartRepository
{

    public function getCartByUser()
    {
        return Cart::query()
            ->where('user_id', Auth()->id())->get();
    }

    public function getCartByUuid(string $uuid)
    {
        return Cart::query()
            ->where('uuid', $uuid)->get();
    }

    public function create(array $data): Cart {
        $productPriceId = $data['product_price_id'];
        $number = $data['number'];
        $totalPrice = $data['total_price'];

        if (empty($productPriceId)) {
            throw new InvalidArgumentException('Product price id is required.');
        }

        if (Auth::check()) {
            $userId = $data['user_id'];
            $cart = Cart::query()
                ->where('user_id', $userId)
                ->where('product_price_id', $productPriceId)
                ->first();
        } else {
            $uuid = $data['uuid'];
            $cart = Cart::query()
                ->where('uuid', $uuid)
                ->where('product_price_id', $productPriceId)
                ->first();
        }

        if ($cart) {
            $cart->number += $number;
            $cart->total_price += $totalPrice;
            $cart->save();
            return $cart;
        }

        return Cart::query()->updateOrCreate([
            'user_id' => $data['user_id'],
            'uuid' => $data['uuid'],
            'product_price_id' => $productPriceId,
            'number' => $number,
            'total_price' => $totalPrice,
        ]);
    }


    public function deleteCartByUser($userId)
    {
        if (Auth::check())
        {
            return Cart::query()
            ->where('user_id', $userId)->delete();
        }
    }

    public function deleteCartByUuid($uuid)
    {
        return Cart::query()
        ->where('uuid', $uuid)->delete();
    }
}
