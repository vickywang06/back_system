<?php
/**
 * Created by PhpStorm.
 * User: wangwenjing
 * Date: 2019/12/23
 * Time: 14:00
 * Note: admin.php
 */

namespace app\queueManage\rule;

class queueManage_rule
{
    public function add_queue()
    {
        return [
            'cmd' => 'require',
        ];
    }
}