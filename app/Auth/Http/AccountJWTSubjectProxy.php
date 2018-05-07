<?php
/**
 * Created by IntelliJ IDEA.
 * User: codercat
 * Date: 2018/4/24
 * Time: 19:26
 */

namespace App\Auth\Http;
use Tymon\JWTAuth\Contracts\JWTSubject;


class AccountJWTSubjectProxy implements  \Illuminate\Contracts\Auth\Authenticatable, JWTSubject {

    protected $id;


    protected $mobile;



    public function setUser($user) {
        $this->user = $user;
    }

    public function setMobile($mobile) {
        $this->mobile = $mobile;
    }



    public function setId($id) {
        $this->id = $id;
    }

    public function getMobile() {
        return $this->mobile;
    }




    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */

    public function getJWTIdentifier()
    {
        return $this->id;
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Get the column name for the primary key
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    /**
     * Get the unique identifier for the user.
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        $name = $this->getAuthIdentifierName();

        return $this->{$name};
    }


    /**
     * Get the password for the user.
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->getPassword();
    }

    /**
     * Get the token value for the "remember me" session.
     * @return string
     */
    public function getRememberToken()
    {
        return $this->rememberToken;
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param string $value
     *
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->rememberToken = $value;
    }

    /**
     * Get the column name for the "remember me" token.
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'rememberToken';
    }
}