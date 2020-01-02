<?php
/**
 * Created by PhpStorm.
 * User: Jerry
 * Date: 6/27/2019
 * Time: 6:16 PM
 * Note: base.php
 */

namespace app\lib;

use ext\conf;
use ext\factory;

class base extends factory
{
    /** @var \PDO $mysql */
    public $mysql;

    /** @var \ext\mysql|object $mysql_app4 */
    public $mysql_app4;

    /** @var \Redis $redis */
    public $redis;

    /** @var \ext\cache $cache */
    public $cache;

    /** @var \ext\queue $queue */
    public $queue;

    /** @var \ext\crypt $crypt */
    public $crypt;

    /**
     * base constructor.
     *
     * @throws \ReflectionException
     */
    public function __construct()
    {
        conf::load('conf', 'dev');
        $this->succeed();
    }

    public function begin()
    {
        $this->mysql->begin();
    }

    public function rollback()
    {
        $this->mysql->rollBack();
    }

    public function commit()
    {
        $this->mysql->commit();
    }

    public function last_insert()
    {
        return (int)$this->mysql->lastInsertId();
    }

    public function fail(int $code)
    {
        return response::new()->fail($code);
    }

    public function failMsg(int $code, string $msg)
    {
        return response::new()->failMsg($code, $msg);
    }

    public function succeed()
    {
        return response::new()->succeed();
    }
}
