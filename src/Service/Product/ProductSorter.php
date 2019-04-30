<?php

namespace Service\Product;


class ProductSorter
{
    public function sort(IProduct $sorter, array $products) {

        echo 'echo from ProductSorter';

        return $sorter->sort($products);
    }
}