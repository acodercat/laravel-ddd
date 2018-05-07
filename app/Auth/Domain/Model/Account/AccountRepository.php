<?php


namespace App\Auth\Domain\Model\Account;
use App\Auth\Domain\Common\ObjectRepository;


interface AccountRepository extends ObjectRepository
{

    public function AccountFromAuthenticateCredential($mobile, $encryptedPassword);
    public function findOneByMobile($mobile);

}