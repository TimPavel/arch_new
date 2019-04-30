<?php
/**
 * Created by PhpStorm.
 * User: timpn
 * Date: 25.04.2019
 * Time: 16:33
 */

namespace Service\Order;


interface IOrder
{
    public function customizeOrder($order);
}