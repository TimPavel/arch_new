<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 30.04.19
 * Time: 18:12
 */

namespace Model\Entity;


interface IStorageAdapter
{
    public function find($id);
}