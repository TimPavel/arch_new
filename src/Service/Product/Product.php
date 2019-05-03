<?php

declare(strict_types = 1);

namespace Service\Product;

use Model;

class Product implements
{
    /**
     * Получаем информацию по конкретному продукту
     *
     * @param int $id
     * @return Model\Entity\Product|null
     */
    public function getInfo(int $id): ?Model\Entity\Product
    {
        $product = $this->getProductRepository()->search([$id]);
        return count($product) ? $product[0] : null;
    }

    /**
     * Получаем все продукты
     *
     * @param string $sortType
     *
     * @return Model\Entity\Product[]
     */
    public function getAll(string $sortType): array
    {
        $productList = $this->getProductRepository()->fetchAll();

        $collection = new ProductSorter();
        // Применить паттерн Стратегия
        // Сортировка по цене
        if($sortType === 'price') {
            $productList = $collection->sort(new SortingByPrice(), $productList);
        }

        // Сортировка по имени
        if($sortType === 'name') {
            $productList = $collection->sort(new SortingByName(), $productList);
        }
        return $productList;
    }

    /**
     * Фабричный метод для репозитория Product
     *
     * @return Model\Repository\Product
     */
    protected function getProductRepository(): Model\Repository\Product
    {
        return new Model\Repository\Product();
    }


    public function testProductMapper($adapter)
    {
        $mapper = new Model\Entity\ProductMapper($adapter);
        $product = $mapper->findById(1);
    }
}
