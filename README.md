# php-encrypt
php加密算法库

        //工行加密举例：
        $iv = str_repeat("\0", openssl_cipher_iv_length('aes-128-cbc'));
        $ase = new \stlswm\PHPEncrypt\AES(base64_decode('MTExMTExMTExMTExMTExMQ=='), 'aes-128-cbc', $iv,
            OPENSSL_RAW_DATA);
        $e = base64_encode($ase->encrypt('123'));
        $d = $ase->decrypt(base64_decode($e));
        $this->assertSame('123',$d);
