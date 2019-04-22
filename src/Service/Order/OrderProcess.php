<?php

namespace Service\Order;
    
 use Service\Order\Basket;
 use Service\Order\OrderBuilder;

 
 class OrderProcess
 {
    private $discount;
    private $billing;
    private $security;
    private $communication;
    
    public function __construct(OrderBuilder $orderBuilder)
    {
        $this->discount = $orderBuilder->getDiscount();
        $this->billing = $orderBuilder->getBilling();
        $this->security = $orderBuilder->getSecurity();
        $this->communication = $orderBuilder->getCommunication();
    }
    
    public function checkoutProcess()
    {
    
    }
    
    
 }