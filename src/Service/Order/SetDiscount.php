<?php

namespace Service\Order;


class SetDiscount extends OrderFormation
{
    public function setDiscount($order) {
        $order = parent::customizeOrder($order);
        // установка скидки
        return $order;
    }
}