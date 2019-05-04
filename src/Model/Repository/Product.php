<?php

declare(strict_types = 1);

namespace Model\Repository;

use Model\Entity;
use Model\Entity\IdentityMap;

class Product
{

    /**
     * Поиск продуктов по массиву id
     *
     * @param int[] $ids
     * @return Entity\Product[]
     */
    public function search(array $ids = []): array
    {
        if (!count($ids)) {
            return [];
        }
        
//        $product = new Entity\Product(9, 'name', 99);
        $product = $this->testIdentityMap('Product', 9);
        $productList = [];
        foreach ($this->getDataFromSource(['id' => $ids]) as $item) {
            $product = clone $product;
            $product['id'] = $item['id'];
            $product['name'] = $item['name'];
            $product['price'] = $item['price'];
            $productList[] = $product;
        }

        return $productList;
    }

    /**
     * Получаем все продукты
     *
     * @return Entity\Product[]
     */
    public function fetchAll(): array
    {
        $product = new Entity\Product(9, 'name', 99);

        $productList = [];
        foreach ($this->getDataFromSource() as $item) {
            $product = clone $product;
            $product['id'] = $item['id'];
            $product['name'] = $item['name'];
            $product['price'] = $item['price'];
            $productList[] = $product;
        }

        return $productList;
    }

    /**
     * Получаем продукты из источника данных
     *
     * @param array $search
     *
     * @return array
     */
    private function getDataFromSource(array $search = [])
    {
        $dataSource = [
            [
                'id' => 1,
                'name' => 'PHP',
                'price' => 15300,
            ],
            [
                'id' => 2,
                'name' => 'Python',
                'price' => 20400,
            ],
            [
                'id' => 3,
                'name' => 'C#',
                'price' => 30100,
            ],
            [
                'id' => 4,
                'name' => 'Java',
                'price' => 30600,
            ],
            [
                'id' => 5,
                'name' => 'Ruby',
                'price' => 18600,
            ],
            [
                'id' => 8,
                'name' => 'Delphi',
                'price' => 8400,
            ],
            [
                'id' => 9,
                'name' => 'C++',
                'price' => 19300,
            ],
            [
                'id' => 10,
                'name' => 'C',
                'price' => 12800,
            ],
            [
                'id' => 11,
                'name' => 'Lua',
                'price' => 5000,
            ],
        ];

        if (!count($search)) {
            return $dataSource;
        }

        $productFilter = function (array $dataSource) use ($search): bool {
            return in_array($dataSource[key($search)], current($search), true);
        };

        return array_filter($dataSource, $productFilter);
    }

    /**
     * функция для теста Identity Map
     * @param string $domainObjectName
     * @param int $objectId
     * @return mixed
     */
    public function testIdentityMap(string $domainObjectName, int $objectId)
    {
        $identityMap = new IdentityMap();

        try {
            return $identityMap->get($domainObjectName, $objectId);
        } catch (EmptyCacheException $e) {
        }

        $object = $this->dataProvider->getEntityById($domainObjectName, $objectId);
        $identityMap->add($object);

        return $object;
    }

}
