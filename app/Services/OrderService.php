<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;

class OrderService
{
    public function createOrder($user , $items){
        $total = 0 ;
        foreach($items as $item ){
            $total += $item['price'] * $item['quantity'];
        }
        $order = Order::create([
            'user_id' => $user->id,
            'total' => $total
        ]);
        foreach($items as $item){
            OrderItem::create([
                "order_id" => $order->id,
                "product_id" => $item['product_id'],
                "quantity" => $item['quantity'],
                "price" => $item['price']
            ]);
        }

        return $order;

    }
 
}
