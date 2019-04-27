<?php

namespace Service\Order;


class OrderTransactionScript
{
    public function getGoodsFromBasket() {
        // логика получения товаров из корзины
    }
    
    public function getDiscounts() {
        // логика получения скидки
    }
    
    public function calculationOrder() {
        // логика расчета цены заказа
    }
    
    public function getBilling() {
        // логика оплаты
    }
    
    public function removeGoodsFromStock() {
        // логика списания товара со склада
    }
    
    public function dispatchOrder() {
        // логика отправки заказа
    }
}