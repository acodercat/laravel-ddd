<?php

namespace App\Auth\Http\Controllers;

use App\User;
use App\Auth\Appliction\Services\AccountRegistrationService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{


    protected $accountRegistrationService;

    public function __construct(AccountRegistrationService $accountRegistrationService)
    {
        $this->accountRegistrationService = $accountRegistrationService;
    }


    public function registerAccount(Request $request) {

//        $req_data = $request->only('username', 'password');
        $AccountInfo = Array();
        $AccountInfo['mobile'] = $request->get('mobile');
        $AccountInfo['password'] = $request->get('password');
        $AccountInfo['nickname'] =  $request->get('nickname');
        $this->accountRegistrationService->register($AccountInfo);
    }
}
