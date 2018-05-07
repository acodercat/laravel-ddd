<?php

namespace App\Auth\Domain\Model\Account;

use App\Auth\Domain\User;



class Account
{

    protected $id;

    
    protected $mobile;

    
    protected $password;


    protected $nickname;



   	public function __construct($mobile, $password, $nickname)
    {
        $this->setMobile($mobile);
        $this->setPassword($password);
        $this->setNickname($nickname);

    }

    public function nickname()
    {
        return $this->nickname;
    }

    public function mobile()
    {
        return $this->mobile;
    }



    public function setNickname(string $nickname)
    {
        if((null == $nickname))
        {
            throw new \Exception("昵称不能为空");
        }
        else if(strlen($nickname) > 32)
        {
            throw new \Exception("昵称超出长度");
        }
        $this->nickname = $nickname;
    }


    public function setPassword(string $password)
    {
        if((null == $password))
        {
            throw new \Exception("密码不能为空");
        }


        $this->password = $password;
    }

    public function setMobile(string $mobile)
    {
        if((null == $mobile))
        {
            throw new \Exception("手机号不能为空");
        }
        else if(strlen($mobile) > 11)
        {
            throw new \Exception("手机号超出长度");
        }
       $this->mobile = $mobile;
    }

//    public function changeMobile($mobile) {
//        $this->mobile = $mobile;
//    }

    public function identity()
    {
        return $this->id;
    }

}