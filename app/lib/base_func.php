<?php
/**
 * Created by PhpStorm.
 * User: xushuhui
 * Date: 2019/7/4
 * Time: 15:20
 */

namespace app\lib;


use ext\core;

class base_func
{
    public static function makeNickName($userAcc)
    {
        return substr_replace($userAcc, '****', 3, 4);
    }

    public static function makeTableSuffix($userId)
    {
        return substr($userId, 0, 1);
    }

    public static function get_rand_str($len = 6, $type = 'str')
    {
        if ($type == 'str') {
            $arr = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));
        } else {
            $arr = array_merge(range(0, 9));
        }
        shuffle($arr);
        $sub_arr = array_slice($arr, 0, $len);
        return implode('', $sub_arr);
    }

    public static function get_rand_pwd($len = 6)
    {
        $arr = array_merge(range(0, 9), range('a', 'z'));
        shuffle($arr);
        $sub_arr = array_slice($arr, 0, $len);
        return implode('', $sub_arr);
    }

    public static function makeLoginPwd($plainPwd, $salt)
    {
        return md5(md5($plainPwd) . md5($salt));
    }

    public static function makePayPwd($userId, $plainPwd)
    {
        return md5(md5($userId) . md5($plainPwd));
    }

    public static function validateLoginPwd($plainPwd, $salt, $password)
    {
        return self::makeLoginPwd($plainPwd, $salt) == $password;
    }

    public static function validatePayPwd($userId, $plainPwd, $password)
    {
        return self::makePayPwd($userId, $plainPwd) == $password;
    }

    public static function pay_rand()
    {
        $data  = [];
        $rules = [
            [0.8, 20],
            [0.9, 22],
            [1.0, 8],
            [1.1, 26],
            [1.2, 24],
            [1.3, 20],
        ];

        foreach ($rules as $item) {
            $data = array_merge($data, array_fill(0, $item[1], $item[0]));
        }

        return $data[mt_rand(0, count($data) - 1)];
    }

    public static function curl_post($url, array $params = [])
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);

        $data = curl_exec($ch);
        curl_close($ch);
        return json_decode($data, true);
    }

    /**
     * @param string $url      get请求地址
     * @param int    $httpCode 返回状态码
     *
     * @return mixed
     */
    public static function curl_get($url, &$httpCode = 0)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //不做证书校验,部署在linux环境下请改为true
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        $file_contents = curl_exec($ch);
        $httpCode      = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $file_contents;
    }

    /**
     * @param string $partner_setting_json
     *
     * @return float|int 获取合伙人的智慧晶加成比例 2019-08-02
     */
    public static function wisdom_rate_get($partner_setting_json, $default_rate)
    {
        $wisdom_rate = 0;
        if ($partner_setting_json) {
            $partner_setting = json_decode($partner_setting_json, true);

            if (!is_array($partner_setting)) {
                return $default_rate;
            }

            $wisdom_rate = $partner_setting['wisdom_rate'];
            if ($wisdom_rate != -1) {
                $wisdom_rate = round($wisdom_rate / 100, 4);//后台设置的比例
            }
        }

        if ($wisdom_rate == 0 || $wisdom_rate == -1) {
            $wisdom_rate = $default_rate;//默认比例
        }
        return $wisdom_rate;
    }

    /**
     * @param string $partner_setting_json
     *
     * @return float|int 获取合伙人的智力值加成比例 2019-08-02
     */
    public static function intell_rate_get($partner_setting_json, float $default_rate)
    {
        $intell_rate = 0;
        if ($partner_setting_json) {
            $partner_setting = json_decode($partner_setting_json, true);

            if (!is_array($partner_setting)) {
                return $default_rate;
            }

            $intell_rate = $partner_setting['intell_rate'];
            if ($intell_rate != -1) {
                $intell_rate = round($intell_rate / 100, 4);//后台设置的比例
            }
        }

        if ($intell_rate == 0 || $intell_rate == -1) {
            $intell_rate = $default_rate;//默认比例
        }
        return $intell_rate;
    }

    /**
     * 获取本周的日期范围
     */
    public static function week_range_get($date = '')
    {
        if (empty($date)) {
            $date = date('Y-m-d');  //当前日期
        }
        $first     = 1; //$first =1 表示每周星期一为开始日期 0表示每周日为开始日期
        $w         = date('w', strtotime($date));  //获取当前周的第几天 周日是 0 周一到周六是 1 - 6
        $now_start = date('Ymd', strtotime("$date -" . ($w ? $w - $first : 6) . ' days')); //获取本周开始日期，如果$w是0，则表示周日，减去 6 天
        $now_end   = date('Ymd', strtotime("$now_start +6 days"));  //本周结束日期
        return ['start' => $now_start, 'end' => $now_end];
    }

    public static function makeOrderNo($coinName)
    {
        $yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
        $orderSn = $yCode[intval(date('Y')) - 2017] . strtoupper(dechex(date('m'))) . date(
                'd') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf(
                '%02d', rand(0, 99));
        return strtolower($coinName) . $orderSn;
    }

    /**
     * 计算两个时间戳之间的小时
     * @param $start
     * @param $end
     *
     * @return string
     */
    public static function remainingTimeHis($start, $end)
    {
        $time = $end - $start;

        $hours = floor($time/ (60 * 60));
        $minutes = floor(($time - $hours * 60 * 60) / 60);
        $seconds = floor($time - $hours * 60 * 60 - $minutes * 60);

        $string = $hours >= 0 ? self::fillDigit($hours) . ':' : '00';
        $string .= $minutes >= 0 ? self::fillDigit($minutes) . ':' : '00';
        $string .= $seconds >= 0 ? self::fillDigit($seconds) : '';
        return $string;
    }

    /**
     * 填补位数
     * @param        $string
     * @param int    $length
     * @param string $fill
     *
     * @return string
     */
    public static function fillDigit($string, int $length = 2, string $fill = '0')
    {
        if (strlen($string) >= $length) return $string;
        for ($i = 0; $i < $length - strlen($string); $i++){
            $string = $fill . $string;
        }
        return $string;
    }
}