<?php

namespace App\Repository;

use App\Models\Cart;
use App\Models\Order;


class OrderRepository{

    public function create(array $data)
    {
        return Order::query()
        ->create([
            'user_id' => $data['user_id'],
            'total_price' => $data['total_price'],
            'status' => $data['status'],
        ]);
    }

    public function listOrder($userId)
    {
        return Order::query()
        ->where('user_id', $userId)->get();
    }
}
