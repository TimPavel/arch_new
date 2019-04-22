<?php

namespace Service\Order;


use Service\Billing\Card;
use Service\Communication\Email;
use Service\Discount\NullObject;
use Service\User\Security;

class OrderBuilder
{
    private $discount;
    private $billing;
    private $communication;
    private $security;
    
    public function setDiscount(NullObject $discount) : void
    {
        $this->discount = $discount;
    }
    
    public function getDiscount(): NullObject
    {
        return $this->discount;
    }
    
    public function setBilling(Card $billing) : void
    {
      $this->billing = $billing;
    }
    
    public function getBilling() : Card
    {
        return $this->billing;
    }
    
    public function setCommunication(Email $communication) : void
    {
        $this->communication = $communication;
    }
    
    public function getCommunication() : Email
    {
        return $this->communication;
    }
    
    public function setSecurity(Security $security) : void
    {
        $this->security = $security;
    }
    
    public function getSecurity() : Security
    {
        return $this->security;
    }
    
    public function build() : OrderProcess
    {
        return new OrderProcess($this);
    }
}