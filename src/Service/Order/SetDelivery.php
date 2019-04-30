<?php

namespace Service\Order;


class SetDelivery extends OrderFormation
{
    public function customizeOrder($order) {
        $order = parent::customizeOrder($order);
        // установка доставки
        return $order;
    }
}