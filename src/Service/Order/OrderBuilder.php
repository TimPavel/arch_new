<?php

namespace Service\Order;


use Service\Billing\IBilling;
use Service\Communication\ICommunication;
use Service\Discount\IDiscount;
use Service\User\ISecurity;
use Model\Entity\Product;

class OrderBuilder
{
    private $discount;
    private $billing;
    private $communication;
    private $security;
    private $products;
    
    public function setProducts($products) : OrderBuilder
    {
        $this->products = $products;
    }
    
    public function getProducts() : Product
    {
        return $this->products;
    }
    
    public function setDiscount(IDiscount $discount) : OrderBuilder
    {
        $this->discount = $discount;
    }
    
    public function getDiscount(): IDiscount
    {
        return $this->discount;
    }
    
    public function setBilling(IBilling $billing) : OrderBuilder
    {
      $this->billing = $billing;
    }
    
    public function getBilling() : IBilling
    {
        return $this->billing;
    }
    
    public function setCommunication(ICommunication $communication) : OrderBuilder
    {
        $this->communication = $communication;
    }
    
    public function getCommunication() : ICommunication
    {
        return $this->communication;
    }
    
    public function setSecurity(ISecurity $security) : OrderBuilder
    {
        $this->security = $security;
    }
    
    public function getSecurity() : ISecurity
    {
        return $this->security;
    }
    
    public function build() : Checkout
    {
        return new Checkout($this);
    }
}