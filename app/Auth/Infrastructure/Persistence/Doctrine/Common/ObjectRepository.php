<?php
/**
 * Created by IntelliJ IDEA.
 * User: codercat
 * Date: 2018/5/3
 * Time: 10:51
 */

namespace App\Auth\Infrastructure\Persistence\Doctrine\Common;
use Doctrine\ORM\EntityRepository;


class ObjectRepository extends EntityRepository
{
    public function save($object)
    {
        $this->getEntityManager()->persist($object);
        $this->getEntityManager()->flush($object);
    }

    public function remove($object)
    {
        $this->getEntityManager()->remove($object);
        $this->getEntityManager()->flush($object);
    }

    public function findOneById($id)
    {
        return $this->find($id);
    }


}