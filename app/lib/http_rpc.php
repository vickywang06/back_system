<?php
/**
 * Created by PhpStorm.
 * User: Jerry
 * Date: 8/24/2019
 * Time: 3:46 PM
 * Note: http_rpc.php
 */

namespace app\lib;

use ext\conf;
use ext\crypt;
use ext\http;
use ext\log;

class http_rpc extends http
{
    //RPC URL
    private $url = '';

    /**
     * http_rpc constructor.
     *
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->url = &$url;
    }

    /**
     * @param array  $data
     * @param string $type
     *
     * @return string
     * @throws \Exception
     */
    public function send(array $data, string $type = parent::CONTENT_TYPE_ENCODED): string
    {
        $log=log::new('makeaddress');
        $log->add('url='.$this->url);
        $log->add($data);
        $log->save();
        if ($data) {
            //rsa加密
            $conf  = conf::get('rsa');
            $pkey  = $conf['PublicKey'];
            $crypt = crypt::new(base_keygen::class);
            $sign  = $crypt->rsa_encrypt(json_encode($data), $pkey);
            $data = [$sign];
        }
        $res = $this->add([
            'url'          => $this->url,
            'data'         => &$data,
            'content_type' => &$type,
            'accept'       => 'application/json',
        ])->fetch();
        unset($data, $type);
        return $res;
    }
}