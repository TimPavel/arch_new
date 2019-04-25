<?php

use Service\Order\OrderForDecoration;
use Service\Order\SetDiscount;
use Service\Order\SetDelivery;

function testDecorator(\Service\Order\IOrder $format, $order) {
    echo $format->customizeOrder($order);
}

$order = new OrderForDecoration;
$discount = new SetDiscount($order);
$delivery = new SetDelivery($discount);


testDecorator($delivery, $order);