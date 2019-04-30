<?php

namespace Service\Order;
    
 use Service\Order\Basket;
 use Service\Order\OrderBuilder;

 
 class Checkout
 {
    private $products;
    private $discount;
    private $billing;
    private $security;
    private $communication;
    
    public function __construct(OrderBuilder $orderBuilder)
    {
        $this->products = $orderBuilder->getProducts();
        $this->discount = $orderBuilder->getDiscount();
        $this->billing = $orderBuilder->getBilling();
        $this->security = $orderBuilder->getSecurity();
        $this->communication = $orderBuilder->getCommunication();
    }
    
    public function checkoutProcess() {
        $totalPrice = 0;
        foreach ($this->products as $product) {
            $totalPrice += $product->getPrice();
        }
    
        $discount = $this->discount->getDiscount();
        $totalPrice = $totalPrice - $totalPrice / 100 * $discount;
    
        $this->billing->pay($totalPrice);
    
        $user = $this->security->getUser();
        $this->communication->process($user, 'checkout_template');
    }
    
    
 }