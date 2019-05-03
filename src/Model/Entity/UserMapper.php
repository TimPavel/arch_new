<?php

namespace Model\Entity;


/**
 * Class UserMapper для реализации паттерна Data Mapper
 * @package Model
 */
class UserMapper
{

    private $storageAdapter;

    public function __construct(IStorageAdapter $storage)
    {
        $this->storageAdapter = $storage;
    }

    public function findById(int $id): User
    {
        $result = $this->storageAdapter->find($id);

        if ($result === null) {
            echo ('User #' . $id . ' not found');
        }

        return $this->mapRowToProduct($result);
    }

    private function mapRowToProduct(array $row): User
    {
        return new User($row['id'], $row['name'], $row['login'], $row['password'], );
    }

    public function getById($id)
    {

    }

    public function getByLogin(string $login)
    {

    }

    public function getPasswordHash()
    {

    }


    public function getRole(): Role
    {

    }
}