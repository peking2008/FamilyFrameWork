<?php

namespace Family\Exceptions;


use Family\Core\Log;
use Family\Core\Singleton;

/**
 * 异常处理
 *
 * @package Family\Exceptions
 *
 */
class RedisException extends BaseException
{

    const DEFAULT_ERROR = [
        'code' => -400,
        'msg' => '系统错误',
    ];

    const CONNECT_ERROR = [
        'code' => -401,
        'msg' => '连接失败: {msg}: {code}'
    ];

    const NO_SUPPORT_CMD = [
        'code' => -402,
        'msg' => '{cmd}命令不支持'
    ];

    const CONFIG_EMPTY = [
        'code' => -403,
        'msg' => 'redis 配置为空'
    ];

    const POOL_FULL = [
        'code' => -404,
        'msg' => 'redis连接池已满'
    ];

    const POOL_EMPTY = [
        'code' => -405,
        'msg' => 'redis连接池已空'
    ];

    const AUTH_ERROR = [
        'code' => -406,
        'msg' => '鉴权失败: {msg}: {code}'
    ];


    public function __construct(array $error = null, array $context = [])
    {
        if (empty($error)) {
            $error = self::DEFAULT_ERROR;
        }
        $msg = self::parseMsg($error['msg'], $context);
        parent::__construct($msg, $error['code']);
    }
}
