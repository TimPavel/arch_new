<?php

namespace Service\Order;


class OrderFormation implements IOrder
{
    protected $order;
    
    public function __construct($order) {
        $this->order = $order;
    }
    
    public function customizeOrder($order) {
        return $this->order->customizeOrder($order);
    }
}