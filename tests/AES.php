<?php

use PHPUnit\Framework\TestCase;

require __DIR__."/../vendor/autoload.php";

/**
 * Class AES
 */
class AES extends TestCase
{
    /**
     * 加密测试
     * @throws \Exception
     */
    public function testEncrypt()
    {
        $iv = str_repeat("\0", openssl_cipher_iv_length('aes-128-cbc'));
        $ase = new \stlswm\PHPEncrypt\AES(base64_decode('BvJRy6KPOzWhZOgS0/dkPA=='), 'aes-128-cbc', $iv,
            OPENSSL_RAW_DATA);
        $this->assertSame('zpS/oYW63YrN197BEcTVqw==', base64_encode($ase->encrypt('123')));
    }
}