<?php
/**
 * Created by IntelliJ IDEA.
 * User: codercat
 * Date: 2018/4/26
 * Time: 10:07
 */

namespace App\Auth\Appliction\Services;

use App\Auth\Domain\Services\AuthenticationService as AuthenticationDomainService;
use \App\Auth\Domain\Model\Account\AccountRepository;
use \App\Auth\Domain\Model\Account\Account;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

class AuthenticationService {

    protected $accountRepository;
    protected $authenticationDomainService;

    public function  __construct(AuthenticationDomainService $authenticationDomainService, AccountRepository $accountRepository)
    {
        $this->authenticationDomainService = $authenticationDomainService;
        $this->accountRepository = $accountRepository;
    }

    public function authenticate($mobile, $password)
    {

        $account = $this->authenticationDomainService->authenticate($mobile, $password);
        return [
            'nickname' => $account->nickname(),
            'mobile' => $account->mobile(),
            'id' => $account->identity()
        ];

    }
}