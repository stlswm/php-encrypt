<?php

namespace stlswm\PHPEncrypt;

use PHPUnit\Util\Exception;

/**
 * Class AES
 * @package stlswm\PHPEncrypt
 */
class AES
{
    /**
     * var string $method 加解密方法，可通过openssl_get_cipher_methods()获得
     */
    protected string $method;

    /**
     * var string $secret_Key 加解密的密钥
     */
    protected string $secretKey;

    /**
     * var string $iv 加解密的向量，有些方法需要设置比如CBC
     */
    protected string $iv;

    /**
     * var int $options
     */
    protected int $options;

    /**
     * 构造函数
     * @param  string  $key  密钥
     * @param  string  $method  加密方式
     * @param  string  $iv  iv向量
     * @param  int  $options
     */
    public function __construct(string $key, string $method = 'AES-128-ECB', string $iv = '', int $options = 0)
    {
        // key是必须要设置的
        if (!$key) {
            throw new Exception('param key is required');
        }
        $method = strtolower($method);
        if (!in_array($method, openssl_get_cipher_methods())) {
            throw new Exception('method:'.$method.' not support');
        }
        $this->secretKey = $key;
        $this->method = $method;
        $this->iv = $iv;
        $this->options = $options;
    }

    /**
     * 加密方法，对数据进行加密，返回加密后的数据
     * @param  string  $data  要加密的数据
     * @return false|string
     */
    public function encrypt(string $data)
    {
        return openssl_encrypt($data, $this->method, $this->secretKey, $this->options, $this->iv);
    }

    /**
     * 解密方法，对数据进行解密，返回解密后的数据
     * @param  string  $data  要解密的数据
     * @return false|string
     */
    public function decrypt(string $data)
    {
        return openssl_decrypt($data, $this->method, $this->secretKey, $this->options, $this->iv);
    }
}