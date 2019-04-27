<?php

namespace Service\Order;


class OrderForDecoration implements IOrder
{
    public function customizeOrder($order) {
        return $order;
    }
}