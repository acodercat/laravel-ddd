<?php
/**
 * Created by IntelliJ IDEA.
 * User: codercat
 * Date: 2018/5/5
 * Time: 11:12
 */

namespace App\Auth\Infrastructure\Services;

use App\Auth\Domain\Services\EncryptionService;


class HashEncryptionService implements EncryptionService
{
    public function encrypt(string $value): string
    {
        return md5($value);
    }
}