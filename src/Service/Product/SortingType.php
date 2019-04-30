<?php

namespace Service\Product;


class SortingByPrice implements IProduct
{
    public function sort(array $products) {
        echo 'Сортировка по цене';
    }
}