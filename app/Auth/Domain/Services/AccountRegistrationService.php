<?php
/**
 * Created by IntelliJ IDEA.
 * User: codercat
 * Date: 2018/4/26
 * Time: 11:36
 */

namespace App\Auth\Domain\Services;

use App\Auth\Domain\Model\Account\AccountRepository;
use App\Auth\Domain\Model\Account\Account;

class AccountRegistrationService
{

    protected $accountRepository;
    protected $encryptionService;

    public function  __construct(AccountRepository $accountRepository, EncryptionService $encryptionService)
    {
        $this->accountRepository = $accountRepository;
        $this->encryptionService = $encryptionService;
    }

    public function register(Array $AccountInfo)
    {

        // 如果昵称为空就把昵称设置成手机号
        null == $AccountInfo['nickname'] ? $nickname = $AccountInfo['mobile'] : $nickname = $AccountInfo['nickname'];

        $encryptedPassword =  $this->encryptionService->encrypt($AccountInfo['password']);
        $account = $this->accountRepository->findByMobile($AccountInfo['mobile']);
        if(null == $account) {
            $this->validatePassword($AccountInfo['password']);
            $newAccount = new Account($AccountInfo['mobile'], $encryptedPassword, $nickname);
            $this->accountRepository->save($newAccount);
            return $newAccount;
        }

        throw new \Exception("手机号已经被注册");

    }

    protected function validatePassword($password)
    {
        if(null == $password) throw new \Exception("密码不能为空");
        if(strlen($password) < 6) throw new \Exception("密码不能小于6位");
    }




}