<?php

namespace App\Services;

use Crypt;
use phpDocumentor\Reflection\Types\Array_;
use phpDocumentor\Reflection\Types\String_;


class KeyService {

    private $key;

    /**
     * encyptByAES method
     * conduct AES encryption
     * 
     * @param $key
     *
     * @return string
     */
    public function encryptByAES($key) {
        $crypted = Crypt::encrypt($key);
        return base64_encode($crypted);
    }

    /**
     * decyptByAES method
     * conduct AES decryption
     * 
     * @param $key
     *
     * @return string
     */
    public function decryptByAES($key) {
        if ($key) {
            $dbkey = base64_decode($key);
            $decrypted = Crypt::decrypt($dbkey);
            return $decrypted;
        }

        return "";
    }

    /**
     * makeRSAKey method
     * generate RSA key pairs
     * 
     * @param $key
     *
     * @return string
     */
    public function makeRSAKey() {
        $keypair = [];
        $rsa = new \Crypt_RSA();
        extract($rsa->createKey());
        $keypair['public'] = $publickey;
        $keypair['private'] = $privatekey;
        return $keypair;
    }

    /**
     * encryptByRSA method
     * conduct RSA encryption on certain input data
     * 
     * @param $key
     * @param $data
     *
     * @return string
     */
    public function encryptByRSA($key, $data) {

        if ($data) {
            $publickey = base64_decode($key);
            $enc = openssl_public_encrypt($data, $encrypted, $publickey);
            return base64_encode($encrypted);
        }
        return '';
    }

    /**
     * decryptByRSA method
     * conduct RSA decryption on certain input data
     * 
     * @param $key
     * @param $data
     *
     * @return string
     */
    public function decryptByRSA($key, $data) {
        $privatekey = openssl_get_privatekey(base64_decode($key));
        $dec = openssl_private_decrypt($data, $decrypted, $privatekey);
        return $decrypted;
    }

    /**
     * columnCrypt method
     * encrypt certain column
     * 
     * @param array $data
     * @param       $column
     *
     * @return array
     */
    public function columnCrypt(array $data, $column) {

        $newArray = [];

        foreach ($data as $key => $value) {

            if (in_array($key, $column)) {
                $value = Crypt::encrypt($data[$key]);
            }
            $newArray[$key] = $value;
        }

        return $newArray;
    }

    /**
     * columnDecrypt method
     * decrypt certain column
     * 
     * @param array $data
     * @param       $column
     *
     * @return array
     */
    public function columnDecrypt(array $data, $column) {

        $newArray = [];

        foreach ($data as $key => $value) {

            if (in_array($key, $column)) {
                $value = Crypt::decrypt($data[$key]);
            }
            $newArray[$key] = $value;
        }

        return $newArray;
    }

}
