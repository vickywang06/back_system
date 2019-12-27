<?php
/**
 * Created by PhpStorm.
 * User: xushuhui
 * Date: 2019/6/29
 * Time: 10:34
 */

namespace app\lib;


use ext\core;
use ext\errno;
use ext\factory;

class response extends factory
{
    public function fail($code, $msg = '')
    {
        if ($msg == '') {
            $msg = error_code::$table[$code];
        }
        errno::set($code, 1, $msg);
        core::stop();
    }

    public function succeed()
    {
        errno::set(error_code::OK, 0, 'ok');
    }

    public function setResult($code, $msg)
    {
        errno::set($code, 1, $msg);
    }

    public function failMsg($code, $msg)
    {
        $this->setResult($code, $msg);
    }
}