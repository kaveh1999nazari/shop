<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Service\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function __construct(protected readonly OrderService $orderService){}

    public function createOrder()
    {
        $order = $this->orderService->create();
        return OrderResource::make($order);
    }

    public function listOrder()
    {
        $order = $this->orderService->listOrder();
        return OrderResource::collection($order);
    }
}
