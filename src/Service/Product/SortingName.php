<?php

namespace Service\Product;


class SortingByName implements IProduct
{

    public function sort(array $products){
        echo 'Сортировка по имени';
    }
}