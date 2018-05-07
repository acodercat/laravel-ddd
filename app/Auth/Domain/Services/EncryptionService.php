<?php
/**
 * Created by IntelliJ IDEA.
 * User: codercat
 * Date: 2018/5/5
 * Time: 11:03
 */

namespace App\Auth\Domain\Services;


interface EncryptionService
{
    public function encrypt(string $value): string;
}