<?php
/**
 * Created by IntelliJ IDEA.
 * User: codercat
 * Date: 2018/4/25
 * Time: 10:33
 */

namespace App\Auth\Appliction\Services;

use App\Auth\Domain\Services\AccountRegistrationService as AccountRegistrationDomainService;

class AccountRegistrationService
{

    protected $accountRegisterDomainService;

    public function  __construct(AccountRegistrationDomainService $accountRegistrationDomainService)
    {
		$this->accountRegistrationDomainService = $accountRegistrationDomainService;
	}


	public function register(Array $AccountInfo)
    {
        $user = $this->accountRegistrationDomainService->register($AccountInfo);
//        dd($user);
	}
}