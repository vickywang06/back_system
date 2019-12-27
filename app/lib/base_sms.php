<?php
/**
 * User: xushuhui
 * Time: 2019/7/11 11:28
 */

namespace app\lib;


use app\common\white_list;
use app\enum\cache_key;
use app\model\user_phone;
use thirds\package;

class base_sms extends base
{
    /**
     * 发送验证码
     *
     * @param string $mobile
     * @param int    $limit
     *
     * @return array
     */
    public function sendSms(string $mobile, int $limit = 6, bool $is_ZW = false)
    {
        //查询安全手机
        $mobile = user_phone::new()->find_security_phone_by_acc($mobile);
        $result = response::new();
        //验证码
        $time     = time();
        $sms_code = mt_rand(100000, 999999);


        //缓存
        $sms_key = cache_key::ACC_SMS_REC . $mobile;
        $key_rec = $this->redis->hMGet($sms_key, ['time', 'cnt']);

        $sms_rec = false === $key_rec['time'] ? ['time' => 0, 'cnt' => 0] : $key_rec;

        //每分钟一次限制
        if ($time - $sms_rec['time'] <= 60) {
            return $result->fail(error_code::SMS_TOO_MORE);
        }

        //有次数限制
        if (0 < $limit && $sms_rec['cnt'] >= $limit) {
            return $result->fail(error_code::SMS_TOO_MORE);
        }

        //记录验证码
        $sms_rec['cnt']++;
        $sms_rec['time'] = $time;

        if (!$this->redis->hMSet($sms_key, $sms_rec)) {
            return $result->fail(error_code::SMS_FAIL);
        }

        //自然日
        $sms_ttl   = $this->redis->ttl($sms_key);
        $today_end = strtotime(date('Y-m-d 23:59:59', $time));
        if (-1 === $sms_ttl) {
            $this->redis->expireAt($sms_key, $today_end);
        }

        //发送验证码
        if (!package::new()->sms()->sendSms($mobile, $sms_code, $is_ZW)) {
            return $result->fail(error_code::SMS_FAIL);
        }

        //记录code
        $this->redis->set(cache_key::SMS_CODE . $mobile, $sms_code, 300);

        return ['code_hash' => rand(1000, 9999)];
    }

    /**
     * 对比验证码
     *
     * @param string $code
     * @param string $mobile
     *
     * @return bool
     * @throws \Exception
     */
    public function chkSms(string $code, string $mobile): bool
    {

        if (!white_list::new()->need_check_code($mobile)) {
            return true;
        }

        //查询安全手机
        $mobile = user_phone::new()->find_security_phone_by_acc($mobile);

        if (!$this->redis->exists($cache_key = cache_key::SMS_CODE . $mobile)) {
            return false;
        }

        $pass_chk = $this->redis->get($cache_key) === $code;

        if ($pass_chk) {
            $this->redis->del($cache_key);
        }

        return $pass_chk;
    }

    /**
     * 发送短信
     *
     * @param string $mobile
     * @param string $msg_arr
     * @param        $msg_type
     *
     * @return array
     * @throws \Exception
     */
    public static function send_msg(string $mobile, string $msg_arr = "", $msg_type)
    {
        //查询安全手机
        $mobile = user_phone::new()->find_security_phone_by_acc($mobile);

        return package::new()->sms()->send_msg($mobile, $msg_arr, $msg_type);
    }

    /**
     * otc发短信 不带变量
     * @param string $mobile
     * @param int    $tpl_id
     *
     * @return mixed
     */
    public function send_msg_by_id(string $mobile, int $tpl_id)
    {
        //查询安全手机
        $mobile = user_phone::new()->find_security_phone_by_acc($mobile);

        return package::new()->sms()->send_msg_by_id($mobile, $tpl_id);
    }

    /**
     * otc发短信 带变量
     * @param string $mobile
     * @param        $tpl_id
     * @param        $order_no
     * @param        $num
     *
     * @return mixed
     */
    public function send_msg_otc(string $mobile, $tpl_id, $order_no, $num)
    {
        //查询安全手机
        $mobile = user_phone::new()->find_security_phone_by_acc($mobile);

        return package::new()->sms()->send_msg_otc($mobile, $tpl_id, $order_no, $num);
    }
}