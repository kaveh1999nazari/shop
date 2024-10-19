<?php

namespace App\Service;

use App\Repository\OrderRepository;
use App\Repository\CartRepository;

class OrderService
{
    function __construct(
        protected readonly OrderRepository $orderRepository,
        protected readonly CartRepository $cartRepository)
    {
    }

    public function create()
    {
        $userId = Auth()->id();
        $status = "pending";
        $totalPrice = $this->getTotalPrice();

        $this->cartRepository->deleteCartByUser($userId);

        return $this->orderRepository->create([
            'user_id' => $userId,
            'total_price' => $totalPrice,
            'status' => $status,
            ]);

    }

    public function listOrder()
    {
        $userId = Auth()->id();
        return $this->orderRepository->listOrder($userId);
    }

    public function getTotalPrice()
    {
        $cartItems = $this->cartRepository->getCartByUser();
        $totalPrice = 0;

        foreach ($cartItems as $item) {
            $totalPrice += $item->total_price;
        }
        return $totalPrice;
    }
}
