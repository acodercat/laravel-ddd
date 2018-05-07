<?php

namespace App\Auth\Infrastructure\Persistence\Doctrine\Repositories;

use App\Auth\Domain\Model\Account\AccountRepository;
use App\Auth\Infrastructure\Persistence\Doctrine\Common\ObjectRepository;

class DoctrineAccountRepository extends ObjectRepository implements AccountRepository
{

    public function AccountFromAuthenticateCredential($mobile, $encryptedPassword)
    {
        return $this->findOneBy(array('mobile' => $mobile, 'password' => $encryptedPassword));
    }

    public function findOneByMobile($mobile) {
        return $this->findOneBy(array('mobile' => $mobile));
    }

}
