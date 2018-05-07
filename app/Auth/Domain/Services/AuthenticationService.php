<?php
/**
 * Created by IntelliJ IDEA.
 * User: codercat
 * Date: 2018/4/26
 * Time: 10:07
 */

namespace App\Auth\Domain\Services;

use App\Auth\Domain\Model\Account\AccountRepository;


class AuthenticationService
{
    protected $accountRepository;
    protected $encryptionService;

    public function  __construct(AccountRepository $accountRepository, EncryptionService $encryptionService)
    {
        $this->accountRepository = $accountRepository;
        $this->encryptionService = $encryptionService;
    }

    public function authenticate(string $mobile, string $password)
    {
        $encryptedPassword = $this->encryptionService->encrypt($password);
        $account = $this->accountRepository->AccountFromAuthenticateCredential($mobile, $encryptedPassword);
        if ($account != null) {
            return $account;
        }
    }
}