<?php
/**
 * Created by IntelliJ IDEA.
 * User: codercat
 * Date: 2018/4/25
 * Time: 10:23
 */
namespace App\Auth\Domain\Common;

interface ObjectRepository
{
    public function save($object);
    public function remove($object);
    public function findOneById($id);
    public function findAll();
}