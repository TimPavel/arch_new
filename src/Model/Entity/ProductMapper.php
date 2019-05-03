<?php

namespace Model\Entity;

/**
 * Class ProductMapper для реализации паттерна Data Mapper
 * @package Model\Entity
 */
class ProductMapper
{
    private $storageAdapter;

    public function __construct(IStorageAdapter $storage)
    {
        $this->storageAdapter = $storage;
    }

    public function findById(int $id): Product
    {
        $result = $this->storageAdapter->find($id);

        if ($result === null) {
            echo ('Product #' . $id . ' not found');
        }

        return $this->mapRowToProduct($result);
    }

    private function mapRowToProduct(array $row): Product
    {
        return new Product($row['id'], $row['name'], $row['price']);
    }
}