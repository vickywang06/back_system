<?php
/**
 * Created by PhpStorm.
 * User: wangwenjing
 * Date: 2019/12/20
 * Time: 17:27
 * Note: admin.php
 */

namespace app\queueManage;


use app\lib\response;
use ext\mpc;
use ext\queue;
use ext\redis;

class queueManage
{
    public $tz = ['*'];
    public $redis;
    public $queue;
    public $response;

    public function __construct()
    {
        $this->redis    = redis::new()->connect();
        $this->queue    = queue::new($this->redis);
        $this->response = response::new();
    }

    /**
     * 添加队列任务
     *
     * @param string $c
     * @param array  $params
     * @param string $group
     * @param string $type
     * @param int    $time
     *
     * @return int
     */
    public function add_queue(string $c, array $params = [], string $group = '', string $type = 'realtime', int $time = 0)
    {
        $this->response->succeed();
        return $this->queue->add($c, $params, $group, $type, $time);
    }

    /**
     * 执行失败的任务重新加入队列
     *
     * @param string $c
     */
    public function fail_task_reback(string $c)
    {
        $params = json_decode($c, true);
        $cmd    = $params['cmd'];
        unset($params['cmd']);
        return $this->add_queue($cmd, $params);
    }

    /**
     * 查询正在监听的任务组
     *
     * @return array
     */
    public function show_queue()
    {
        $queue_list = $this->queue->show_queue();
        $this->response->succeed();
        $res = [];
        foreach ($queue_list as $key => $val) {
            $res[] = ['title' => $key, 'create_time' => date('Y-m-d H:i:s', $val)];
        }
        return $res;
    }

    /**
     * 查询进程
     *
     * @return array
     */
    public function show_process()
    {
        $process_list = $this->queue->show_process();
        $this->response->succeed();
        $res = [];
        foreach ($process_list as $key => $val) {
            $res[] = ['title' => $key, 'create_time' => date('Y-m-d H:i:s', $val)];
        }
        return $res;
    }

    /**
     * 查看执行成功或失败任务
     *
     * @param string $type
     * @param int    $page
     * @param int    $pagesize
     */
    public function show_logs(string $type = 'success', int $page = 1, int $limit = 10)
    {
        $res = $this->queue->show_logs($type, ($page - 1) * $limit, $limit);
        $this->response->succeed();
        $list = $res['data'];
        $res  = [];
        foreach ($list as $json) {
            $arr           = json_decode($json, true);
            $arr['return'] = $arr['return'] == 'null' ? '空' : $arr['return'];
            $res[]         = ['title' => $arr['data'], 'create_time' => $arr['time'], 'return_val' => $arr['return']];
        }
        return $res;
    }

    /**
     * 启动主进程
     *
     * @throws \Exception
     */
    public function go()
    {
        $plist = $this->show_process();
        if ($plist) {
            return $this->response->fail(1001, '进程已经在运行中');
        }
        $res = mpc::new()->add(['c' => 'queue/master-start'])->go(false);
        return $this->response->succeed();
    }

    /**
     * 杀进程
     *
     * @return int
     */
    public function kill()
    {
        $res = $this->queue->kill();
        $this->response->succeed();
        return $res;
    }

    /**
     * 测试任务
     */
    function test()
    {
        date_default_timezone_set("Asia/Shanghai");
        $this->redis->set('wwj' . date('YmdHis'), '123');
    }

    function test2()
    {
        date_default_timezone_set("Asia/Shanghai");
        $this->redis->set('hh' . date('YmdHis'), '123');
    }

}