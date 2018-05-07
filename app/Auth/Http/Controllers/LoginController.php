<?php

namespace App\Auth\Http\Controllers;

//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Auth\Domain\model\Account\Account;
use App\Auth\Http\AccountJWTSubjectProxy;
use App\Auth\Appliction\Services\AuthenticationService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

//    use AuthenticatesUsers;

    protected $authenticationService;


    public function __construct(AuthenticationService $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => \Auth::guard()->factory()->getTTL() * 60
        ]);

    }

    public function test(Request $request)
    {
//        dd(\JWTAuth::getToken());
//        \JWTAuth::setToken($token);
//        dd(\Auth::check());
//        \JWTAuth::setToken($token);
//        dd(\JWTAuth::user());
        $token = \JWTAuth::getToken();
        $id = \JWTAuth::decode($token)->get('sub');
    }

    public function accessToken(Request $request)
    {

        $password = $request->get('password');
        $mobile =  $request->get('mobile');
        $account = $this->authenticationService->authenticate($mobile, $password);

        $accountJWTSubjectProxy = new AccountJWTSubjectProxy();
        $accountJWTSubjectProxy->setMobile($account['mobile']);
        $accountJWTSubjectProxy->setId($account['id']);
        $token = \Auth::guard()->login($accountJWTSubjectProxy);
        return $this->respondWithToken($token);


//        $payload = \JWTAuth::makePayload($accountJWTSubjectProxy);

//        \Auth::loginUsingId(1);
//        dd($payload->get());
//        $token = \JWTAuth::encode($payload);
//        \JWTAuth::setToken($token);
//        dd(\Auth::check());
//        $token = \Auth::guard()->login($accountJWTSubjectProxy);
//        dd($token);
//        \Auth::guard()->setUser($accountJWTSubjectProxy);
//        dd(\Auth::check());
//        dd(\JWTAuth::user()->getMobile());
//        dd(\JWTAuth::parseToken()->authenticate());
//        $payload['token'] = 1;
//        dd($payload);
//        dd(\JWTAuth::decode($payload));
//        dd(\JWTAuth::parseToken()->authenticate());
//        dd(\JWTAuth::attempt(['mobile' => '13198314109', 'password' => '121212']));
////        dd(\Auth::attempt(['mobile' => '13198314109', 'password' => '121212']));
//        $accountRepository = new DoctrineAccountRepository();
//        $account = new Account('13198314106','121212');
//        $accountRepository->save($account);

    }


}
