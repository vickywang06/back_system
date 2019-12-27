<?php
/**
 * Created by PhpStorm.
 * User: xushuhui
 * Date: 2019/6/29
 * Time: 10:42
 */

namespace app\lib;


class error_code
{
    /**
     * 系统错误部分
     *
     * 涵盖范围：
     * 所有非业务层面的错误（数据库连接失败，全局验签失败，全局操作锁失败等）
     * 所有第三方业务失败返回的错误
     *
     * 使用三位编码
     */
    const OK = 200;

    const SQL_ERROR            = 201;
    const INVALID_PARAMS       = 202;
    const SYSTEM_ERROR         = 203;
    const NO_USER              = 204;
    const USER_EXIST           = 205;
    const USER_LOCK            = 206;
    const ERROR_LOGIN_PASSWORD = 207;
    const ERROR_INVITE         = 208;
    const NOT_INVITE           = 209;
    const NO_INVITE_RELATION   = 210;
    const VERIFY_PRESON_FULL   = 211;
    const LOGIN_TIMEOUT        = 212;
    const LOGIN_IN_ANOTHER     = 213;
    const USER_LOCKED          = 214;
    const LOGOUT_FAIL          = 215;
    const TOKEN_MUST_EXIST     = 216;
    const ERROR_PAY_PASSWORD   = 217;
    const VERIFY_WAY_NOT_OPEN  = 218;
    const FORBIDDEN_JOIN       = 219;
    const TODAY_VERIFY_LIMIT   = 220;
    const NEED_PAY             = 221;
    const ID_CARD_EXISTS       = 222;
    const BANKCARD_EXIST       = 223;
    const ALIPAY_NUM_PAY       = 224;
    const VERIFY_PASS          = 225;
    const SMS_FAIL             = 226;
    const SMS_TOO_MORE         = 227;
    const ERROR_SMS_CODE       = 228;
    const NOT_SAME_MOBILE      = 229;
    const VERIFY_FAIL          = 230;
    const NO_VERIFY_INFO       = 231;
    const WAIT_REVIEW          = 232;
    const WAIT_PROCESS_LOCK    = 233;
    const NOT_BUY_TIME         = 234;
    const NO_VERIFY            = 235;
    const SMART_NO_OPEN        = 236;
    const WALLET_NO_WISDOM     = 237;
    const USER_SMART_LIMIT     = 238;
    const FORBID_BUY           = 239;
    const NEED_FACE_VERIFY     = 240;
    const FORBID_OPERATION     = 241;
    const ERROR_OLD_PASSWORD   = 242;
    const TODAY_SHARE_REWARD   = 343;
    const SMART_NO_STOCK       = 344;
    const API_SIGN_FAILED      = 303;
    const API_VERIFY_FAILED    = 304;
    const VERSION_UPDATE       = 305;
    const HAD_SET_PAY_WORD     = 306;
    const PAY_PASSWORD_ERROR   = 307;
    const SMART_INTELL_ERROR   = 308;

    const ON_LOCK_SYSTEM = 309;
    const ON_LOCK_OTC    = 310;
    //otc模块
    const  OTC_NUM_ERROR      = 400;
    const  UNFINISH_ORDER     = 401;
    const  ERROR_ORDER_STATUS = 402;
    const  NO_RIGHTS          = 403;
    // 文章模块
    const ARTICLE_NOT_EXIST     = 1000;
    const INFORMATION_NOT_EXIST = 1001;
    const NOT_USER_SHARE        = 1002;
    const PAY_PWD_ERROR         = 1003;
    const WISDOM_NOT_ENOUGH     = 1004;

    //交易
    const VERIFY_UNFINISHED    = 2000;
    const USER_RECEIVED        = 2001;
    const SAFE_PASSWORD_ERROR  = 2003;
    const STORE_NOT_EXIST      = 2004;
    const WARRING_CNT_OUT      = 2006;
    const USER_WALLET_ERROR    = 2007;
    const USER_TEL_ERROR       = 2008;
    const CAN_NOT_TO_SELF      = 2009;
    const STORE_CAN_NOT_DO     = 2010;
    const TRANS_NOT_FINISH     = 2011;
    const TRANS_QUOTA_OUT      = 2012;
    const TRANS_TIMES_OUT      = 2013;
    const TRANS_QUOTA_USED_UP  = 2014;
    const LOW_INTELLECT        = 2015;
    const MUST_NOT_TRANSFER    = 2016;
    const STORE_SMALL_NUM_ERR  = 2017;
    const STORE_BIG_NUM_ERR    = 2018;
    const STORE_MAX_NUM_OUT    = 2019;
    const TRANSFER_TIMES_OUT   = 2020;
    const TRANSFER_MAX_OUT     = 2021;
    const TRAN_RELATION_OUT    = 2022;
    const WARRANT_MIX_ERROR    = 2023;
    const MODULE_NOT_OPEN      = 2024;
    const TRANS_TIME_OUT       = 2025;
    const SMALL_DEAL_NUM_ERR   = 2026;
    const BIG_DEAL_NUM_ERR     = 2027;
    const SMALL_DEAL_PRICE_ERR = 2028;
    const BIG_DEAL_PRICE_ERR   = 2029;
    const ORDER_COUNT_OUT      = 2030;
    const PUBLISH_TIME_OUT     = 2031;
    const MATCH_TIMES_OUT      = 2032;
    const SMALL_STORE_MUST_NOT = 2033;
    const BOOST_NOT_ENOUGH     = 2034;
    const TRANSFER_NUM_OUT     = 2035;
    const RECEIVE_FROM_SMALL   = 2036;
    const MONTH_QUOTA_OUT      = 2037;
    const OUT_SHOP_QUOTA       = 2038;
    const DEAL_MATCHED         = 2039;
    const SYSTEM_BUSY          = 2040;
    const ASW_LOCK_ON_SMART    = 2041;

    const DEAL_IN_MAINTAIN = 2042;

    //商城模块
    const SOLD_OUT                  = 8000;
    const ORDER_STATUS_NOT_MATCH    = 8001;
    const NO_LOGISTICS              = 8002;
    const EXPRESS_COMPANY_NOT_FOUND = 8003;
    const OPERATE_FAIL              = 8004;
    const ADDRESS_NOT_EXIST         = 8005;
    const USER_NOT_VERIFY           = 8006;
    const USER_FROZEN               = 8007;
    const STOCK_NOT_ENOUGH          = 8008;
    const OUT_QUOTA                 = 8009;
    const ORDER_SUBMIT_FAIL         = 8010;
    const GOODS_NOT_EXISTS          = 8011;
    const EXCEPTION_STATUS          = 8012;
    const SPEC_NOT_EXISTS           = 8013;
    const ORDER_NOT_FOUND           = 8014;
    const ORDER_EXCEPTION_STATUS    = 8015;
    const ORDER_EXPIRE              = 8016;
    const PAY_FAIL                  = 8017;
    const CANCEL_FAIL               = 8018;
    const SUBMIT_FAIL               = 8019;
    const INVALID_JSON              = 8020;
    const AUDIT_WAITING             = 8021;
    const NO_AUTH                   = 8022;
    const ALREADY_BELONG_CLUB       = 8023;
    const UN_JOIN_CLUB              = 8024;
    const CLUB_NOT_DISSOLVED        = 8025;
    const QUIT_FAIL                 = 8026;
    const ONLY_ONE_CLUB             = 8027;
    const MUST_WAIT_24_HOURS        = 8028;
    const REACH_MAX_LIMIT           = 8029;
    const JOIN_FAIL                 = 8030;
    const INVITE_SEND_YET           = 8031;
    const SAVE_FAIL                 = 8032;
    const APPLY_IS_EMPTY            = 8033;
    const APPLY_IS_EXISTS           = 8034;
    const DEFAULT_ADDR_IS_EMPTY     = 8035;
    const NUM_MUST_NOT_ZERO         = 8036;
    const SPEC_MUST                 = 8037;


    //答题模块
    const NOT_ANSWER_TIME   = 3000;
    const QUESTION_NO_EXIST = 3001;
    const ERROR_ANSWER      = 3002;

    //充值模块
    const NOT_RECHARGE_TIME       = 4000;
    const RECHARGE_OVER_LIMIT     = 4001;
    const RECHARGE_NOT_SUPPORT    = 4002;
    const NOT_REGISTERED_PHONE    = 4003;
    const LIFE_PAYMENT_OVER_LIMIT = 4004;

    //活动模块
    const ACTIVITY_NOT_BEGIN   = 5000;
    const ACTIVITY_FINISHED    = 5001;
    const ACTIVITY_NOT_RUNNING = 5002;
    const ANSWER_FINISHED      = 5003;
    const ANSWER_ERROR         = 5004;
    const ACTIVITY_TIME_ERROR  = 5005;
    const ACTIVITY_NO_REWARD   = 5006;
    const COIN_NOT_ENOUGH      = 5007;
    const PLATFORM_NO_COIN     = 5008;
    const CHANGE_NUM_TOO_FEW   = 5009;
    const DRAW_NUM_TOO_FEW     = 5010;
    const EX_START_ERROR       = 5011;
    const EX_END_ERROR         = 5012;
    const DRAW_START_ERROR     = 5013;
    const DRAW_END_ERROR       = 5014;
    const OUT_OF_RANGE         = 5015;
    const USER_DATA_ERROR      = 5016;
    const DRAW_NUM_TOO_LARGE   = 5017;
    const DRAWABLE_NOT_ENOUGH  = 5018;
    const ASSETS_IS_NULL       = 5019;
    const NO_CHANGE            = 5020;
    const TRANS_OFF            = 5021;
    const TRANS_NUM_TOO_FEW    = 5022;
    const TRANS_NUM_TOO_LARGE  = 5023;
    const TRANS_INFO_ERROR     = 5024;
    const ASSETS_NOT_ENOUGH    = 5025;
    const CHANGE_MIN           = 5026;
    const CHANGE_MAX           = 5027;
    const CHANGE_NUM_ERROR     = 5028;

    //资产模块
    const INVALID_ADDRESS   = 6002;
    const FORBID_WITHDRAW   = 6003;
    const WALLET_NOT_ENOUGH = 6004;
    const MONTH_ERROR       = 6005;
    const RECORD_NOT_EXIST  = 6006;
    const STATUS_EXCEPTION  = 6007;
    const NEED_24_HOURS     = 6008;
    const ART_NOT_ENOUGH     = 6009;
    const MUST_CHANGE_DRAW     = 6010;


    //用户积分
    const
        ALIPAY_BIND_ERROR = 7000,
        ALIPAY_UNBIND = 7001,
        ACTICITY_POINTS_WITHDRAW_NOT_EXIST = 7002,
        USER_REMAINING_POINTS_DEFICIENCY = 7003,
        ACTICITY_POINTS_WITHDRAW_UNSTART = 7004,
        ACTICITY_POINTS_WITHDRAW_FINISH = 7005,
        ACTICITY_POINTS_WITHDRAW_MINEXCHANGE = 7006,
        ACTICITY_POINTS_WITHDRAW_ERROR = 7007,
        ACTICITY_POINTS_WITHDRAW_MINEXCHANGE_MULTIPLE = 7008
        ;

    //积分兑换
    const POINTS_EX_CLOSED      = 7100;
    const POINTS_EX_NOT_STARTED = 7101;
    const POINTS_EX_ENDED       = 7102;
    const POINTS_EX_MONEY_ERROR = 7103;

    //前端预留段 9xxx

    public static $table = [
        self::OK                   => 'ok',
        self::SQL_ERROR            => '数据库错误',
        self::API_SIGN_FAILED      => '验签参数缺失',
        self::API_VERIFY_FAILED    => '验签失败',
        self::INVALID_PARAMS       => '无效参数',
        self::SYSTEM_ERROR         => '系统错误',
        self::NO_USER              => '用户不存在',
        self::USER_EXIST           => '用户已存在',
        self::USER_LOCK            => '用户被封锁',
        self::ERROR_LOGIN_PASSWORD => '用户登录密码错误',
        self::ERROR_INVITE         => '邀请码错误',
        self::VERIFY_PRESON_FULL   => '该认证名额已用完，请采用刷脸认证',
        self::NOT_INVITE           => '该邀请人不能推广',
        self::LOGIN_TIMEOUT        => '登录超时',
        self::LOGIN_IN_ANOTHER     => '您已在别处登录，请重新登录',
        self::USER_LOCKED          => '当前用户被锁定',
        self::LOGOUT_FAIL          => '用户退出失败',
        self::TOKEN_MUST_EXIST     => 'token不能为空',
        self::ERROR_PAY_PASSWORD   => '用户支付密码错误',
        self::VERIFY_WAY_NOT_OPEN  => '验证方式未开放',
        self::FORBIDDEN_JOIN       => '暂时不能加入',
        self::TODAY_VERIFY_LIMIT   => "当日认证次数已达上限",
        self::NEED_PAY             => "人脸识别通过，请完成支付",
        self::ID_CARD_EXISTS       => "该身份证号已存在",
        self::BANKCARD_EXIST       => "该银行卡号已存在",
        self::ALIPAY_NUM_PAY       => "该支付宝账户已存在",
        self::VERIFY_PASS          => "已通过认证",
        self::SMS_FAIL             => "验证码发送失败",
        self::SMS_TOO_MORE         => "验证码获取次数过多，请稍后再试",
        self::ERROR_SMS_CODE       => "验证码错误",
        self::NOT_SAME_MOBILE      => "获取验证码手机号与提交手机号不符",
        self::VERIFY_FAIL          => "认证失败",
        self::NO_VERIFY_INFO       => "未提交认证资料",
        self::WAIT_REVIEW          => "请等待审核",
        self::WAIT_PROCESS_LOCK    => "我们正在处理您的请求，请稍后",
        self::FORBID_BUY           => "禁止购买智慧包",
        self::NOT_BUY_TIME         => "系统结算中，暂不可兑换智慧包",
        self::NO_VERIFY            => "您尚未完成实名认证",
        self::SMART_NO_OPEN        => "该智慧包暂未开放",
        self::WALLET_NO_WISDOM     => "账户余额不足",
        self::USER_SMART_LIMIT     => "该智慧包拥有数量已达上限",
        self::NEED_FACE_VERIFY     => "需要完成人脸识别认证",
        self::FORBID_OPERATION     => "暂时不允许修改",
        self::ERROR_OLD_PASSWORD   => '原始密码输入错误',
        self::TODAY_SHARE_REWARD   => '今日助力分已获得',
        self::SMART_NO_STOCK       => '智慧包库存不足',
        self::VERSION_UPDATE       => '请升级到最新版本',
        self::HAD_SET_PAY_WORD     => '已经设置支付密码',
        self::SYSTEM_BUSY          => '暂停服务，请稍后再来',
        self::PAY_PASSWORD_ERROR   => '原始密码输入错误',
        self::ASW_LOCK_ON_SMART    => '正在激活智慧包，请稍后再来答题',
        self::SMART_INTELL_ERROR   => '购买圣贤智慧包，最低需要100基础智力值',

        self::DEAL_IN_MAINTAIN => '系统维护，暂时关闭，请等待通知',

        self::ON_LOCK_SYSTEM     => '暂不可进行此操作，晚点再来看看把',
        self::ON_LOCK_OTC        => '不在交易时间范围',
        self::OTC_NUM_ERROR      => "交易数量错误",
        self::UNFINISH_ORDER     => '您有未完成订单，不能撤销此挂单',
        self::ERROR_ORDER_STATUS => "订单状态错误",
        self::NO_RIGHTS          => '没有权限',
    ]
    +
    [
        self::ARTICLE_NOT_EXIST     => '文章不存在',
        self::INFORMATION_NOT_EXIST => '资讯不存在',
        self::NOT_USER_SHARE        => '非用户分享资讯，不能打赏',
        self::PAY_PWD_ERROR         => '安全密码错误',
        self::WISDOM_NOT_ENOUGH     => '账户余额不足'
    ]
    +
    [
        self::VERIFY_UNFINISHED    => '您尚未完成实名认证，暂不可交易',
        self::USER_RECEIVED        => '接收后需间隔24小时才可转让',
        self::SAFE_PASSWORD_ERROR  => '安全密码错误',
        self::STORE_NOT_EXIST      => '该担保商不存在',
        self::WARRING_CNT_OUT      => '每个担保商最多担保7次',
        self::USER_WALLET_ERROR    => '用户钱包地址错误',
        self::USER_TEL_ERROR       => '用户手机号码错误',
        self::CAN_NOT_TO_SELF      => '不能转给自己',
        self::STORE_CAN_NOT_DO     => '服务商无法使用担保转账',
        self::TRANS_NOT_FINISH     => '您有交易未完成',
        self::TRANS_QUOTA_OUT      => '本次交易已超出您的可用额度',
        self::TRANS_TIMES_OUT      => '周期内只能使用一种交易',
        self::TRANS_QUOTA_USED_UP  => '周期内可用额度已用完',
        self::LOW_INTELLECT        => '智力值过低',
        self::MUST_NOT_TRANSFER    => '您暂不可转让',
        self::STORE_SMALL_NUM_ERR  => '转让数量仅限于1-30枚',
        self::STORE_BIG_NUM_ERR    => '转让数量仅限于100枚以上且不得大于1500枚',
        self::STORE_MAX_NUM_OUT    => '对方保留智慧晶数量已达上限，暂不可转账',
        self::TRANSFER_TIMES_OUT   => '同一天内转给同一人不可超过两次',
        self::TRANSFER_MAX_OUT     => '五天内最多接收散货中间商50枚',
        self::TRAN_RELATION_OUT    => '仅可向下三代或商家转账',
        self::WARRANT_MIX_ERROR    => '担保转账最低需要100枚智慧晶',
        self::MODULE_NOT_OPEN      => '暂未开放',
        self::TRANS_TIME_OUT       => '不在交易时间内',
        self::SMALL_DEAL_NUM_ERR   => '散货区数量限制为1-20枚',
        self::BIG_DEAL_NUM_ERR     => '整货区数量限制为50枚-3000枚且为10的倍数',
        self::SMALL_DEAL_PRICE_ERR => '单价超出散货区当日区间价',
        self::BIG_DEAL_PRICE_ERR   => '单价超出整货区当日区间价',
        self::ORDER_COUNT_OUT      => '挂单数量已达上限',
        self::PUBLISH_TIME_OUT     => '暂不可发布',
        self::MATCH_TIMES_OUT      => '匹配数量已达上限，请完成后再来匹配',
        self::SMALL_STORE_MUST_NOT => '散货服务商禁止匹配买单',
        self::BOOST_NOT_ENOUGH     => '助力分不足，匹配失败',
        self::TRANSFER_NUM_OUT     => '转账数量超出限制',
        self::RECEIVE_FROM_SMALL   => '五天内最多接收散货中间商30枚',
        self::MONTH_QUOTA_OUT      => '本月额度已用完',
        self::OUT_SHOP_QUOTA       => '该商家接收限额已用完',
        self::DEAL_MATCHED         => '该单已被匹配',
    ] +
    [
        self::SOLD_OUT                  => "该商品已下架",
        self::ORDER_STATUS_NOT_MATCH    => "订单状态不匹配",
        self::NO_LOGISTICS              => "暂无物流信息",
        self::EXPRESS_COMPANY_NOT_FOUND => "该快递公司暂时不支持",
        self::OPERATE_FAIL              => "操作失败",
        self::ADDRESS_NOT_EXIST         => "用户地址不存在",
        self::USER_NOT_VERIFY           => "您尚未完成实名认证",
        self::USER_FROZEN               => "您的账户已被冻结，暂不可交易",
        self::STOCK_NOT_ENOUGH          => "商品库存不足",
        self::OUT_QUOTA                 => "本次消费已经超出该店铺的可用额度",
        self::ORDER_SUBMIT_FAIL         => "订单提交失败",
        self::SUBMIT_FAIL               => "提交失败",
        self::GOODS_NOT_EXISTS          => "该商品不存在",
        self::EXCEPTION_STATUS          => "该商品状态异常",
        self::SPEC_NOT_EXISTS           => "该商品规格不存在",
        self::ORDER_NOT_FOUND           => "该订单信息不存在",
        self::ORDER_EXCEPTION_STATUS    => "该订单状态异常",
        self::ORDER_EXPIRE              => "该订单已过期，请重新下单",
        self::PAY_FAIL                  => "支付失败",
        self::CANCEL_FAIL               => "取消失败",
        self::INVALID_JSON              => "json无效",
        self::AUDIT_WAITING             => "您已经提交资料，请等待审核",
        self::NO_AUTH                   => "您暂无权限",
        self::ALREADY_BELONG_CLUB       => "您当前已有所属俱乐部，请先退出后再创建",
        self::UN_JOIN_CLUB              => "您未加入当前俱乐部",
        self::CLUB_NOT_DISSOLVED        => "当前俱乐部不可解散",
        self::QUIT_FAIL                 => "退出失败",
        self::ONLY_ONE_CLUB             => "每人仅可加入一个俱乐部",
        self::MUST_WAIT_24_HOURS        => "再次申请加入俱乐部需等待24小时",
        self::REACH_MAX_LIMIT           => "俱乐部人数已达上限，暂不可加入",
        self::JOIN_FAIL                 => "加入失败",
        self::INVITE_SEND_YET           => "邀请已发送,不可重复邀请",
        self::SAVE_FAIL                 => "修改失败",
        self::APPLY_IS_EMPTY            => "该用户暂无申请信息",
        self::APPLY_IS_EXISTS           => "您的申请已经审核通过，不可重复申请",
        self::DEFAULT_ADDR_IS_EMPTY     => "您还未设置默认地址",
        self::NUM_MUST_NOT_ZERO         => "商品数量不能为0",
        self::SPEC_MUST                 => "请选择商品规格",
    ]
    +
    [
        self::NOT_ANSWER_TIME   => "系统结算中，暂不可答题",
        self::QUESTION_NO_EXIST => "题目不存在",
        self::ERROR_ANSWER      => "回答错误",
    ] + [
        self::NOT_RECHARGE_TIME       => "当前时间不可充值",
        self::RECHARGE_OVER_LIMIT     => "生活缴费每日仅可操作一次",
        self::RECHARGE_NOT_SUPPORT    => "当前充值模式不支持",
        self::NOT_REGISTERED_PHONE    => "请输入该平台注册的手机号",
        self::LIFE_PAYMENT_OVER_LIMIT => "今日限量已用完，请明天再来吧！",
    ] + [
        self::ACTIVITY_NOT_BEGIN   => "活动尚未开启",
        self::ACTIVITY_FINISHED    => "活动已经结束",
        self::ACTIVITY_NOT_RUNNING => "暂时不在活动期间",
        self::ANSWER_ERROR         => "答题错误",
        self::ANSWER_FINISHED      => "今日答题已结束，请明天再来",
        self::ACTIVITY_TIME_ERROR  => "每天答题时间：下午15:00-22:00",
        self::ACTIVITY_NO_REWARD   => "今天助力分已经派送完成，您继续答题将不能获得任何奖励！",
        self::OUT_OF_RANGE         => "已超过最多可兑换数量",
        self::COIN_NOT_ENOUGH      => "持有数量不足",
        self::PLATFORM_NO_COIN     => "已超过剩余可兑换数量",
        self::CHANGE_NUM_TOO_FEW   => "必须满足兑换倍数",
        self::DRAW_NUM_TOO_FEW     => "不能低于最小提取数量",
        self::DRAW_NUM_TOO_LARGE   => "不能高于最大提取数量",
        self::EX_START_ERROR       => "还没到提取时间",
        self::EX_END_ERROR         => "兑换时间已结束",
        self::DRAW_START_ERROR     => "还没到可提取时间",
        self::DRAW_END_ERROR       => "提取时间已结束",
        self::USER_DATA_ERROR      => "用户信息填写有误",
        self::DRAWABLE_NOT_ENOUGH  => "超出已释放数量",
        self::ASSETS_IS_NULL       => "该资产不存在",
        self::NO_CHANGE            => "暂时无法置换",
        self::TRANS_OFF            => "暂时无法交易",
        self::TRANS_NUM_TOO_FEW    => "不能低于最小交易数量",
        self::TRANS_NUM_TOO_LARGE  => "不能高于最大交易数量",
        self::TRANS_INFO_ERROR     => "收款类型不属于同一用户",
        self::ASSETS_NOT_ENOUGH    => "资产余额不足",
        self::CHANGE_MIN           => "不能低于最低置换数量",
        self::CHANGE_MAX           => "不能高于最大置换数量",
        self::CHANGE_NUM_ERROR     => "兑换数量必须大于零",
    ]
    +
    [
        self::INVALID_ADDRESS   => '无效的钱包地址',
        self::FORBID_WITHDRAW   => '该币种暂时不能提币',
        self::WALLET_NOT_ENOUGH => '该币种账户余额不足',
        self::MONTH_ERROR       => '选择的年份或月份有误',
        self::RECORD_NOT_EXIST  => '该提币记录不存在',
        self::STATUS_EXCEPTION  => '状态异常,不能撤销',
        self::NEED_24_HOURS     => '重置密码后提币需等待24小时',
        self::ART_NOT_ENOUGH     => '数量不足，置换ART可获得划转数量！',
        self::MUST_CHANGE_DRAW     => '请先完成一次ART的置换和提取',
    ]
    +
    [
        self::ALIPAY_BIND_ERROR => '支付宝信息绑定失败',
        self::ALIPAY_UNBIND => '支付宝尚未绑定',
        self::ACTICITY_POINTS_WITHDRAW_NOT_EXIST => '暂无积分提现活动',
        self::USER_REMAINING_POINTS_DEFICIENCY => '会员可提现积分不足',
        self::ACTICITY_POINTS_WITHDRAW_UNSTART => '提现活动未开始',
        self::ACTICITY_POINTS_WITHDRAW_FINISH => '提现活动已结束',
        self::ACTICITY_POINTS_WITHDRAW_MINEXCHANGE => '最低提现数量不满足',
        self::ACTICITY_POINTS_WITHDRAW_MINEXCHANGE_MULTIPLE => '请输入正确的兑换数量',
        self::ACTICITY_POINTS_WITHDRAW_ERROR => '积分提现失败',
    ]
    +
    [
        self::POINTS_EX_CLOSED      => '兑换活动异常',
        self::POINTS_EX_NOT_STARTED => '兑换活动未开始',
        self::POINTS_EX_ENDED       => '兑换活动已结束',
        self::POINTS_EX_MONEY_ERROR => '兑换积分数量有误',
    ]
    ;
}
