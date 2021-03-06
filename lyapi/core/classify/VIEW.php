<?php

namespace LyApi\core\classify;

class VIEW extends BASIC
{

    //设置头文件
    public static function SetHeader($string, $replace = true, $http_response_code = null)
    {
        header($string, $replace, $http_response_code);
    }

    //获取各种数据
    public static function GET($type, $key)
    {
        $t = '_' . $type;
        if (array_key_exists($t, $GLOBALS)) {
            if (array_key_exists($key, $GLOBALS[$t])) {
                return $GLOBALS[$t][$key];
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    //渲染页面
    public static function Render($data, $vars)
    {
        $str = $data;
        if (is_array($vars)) {
            foreach ($vars as $key => $val) {
                $str = str_replace('$' . $key, $val, $str);
            }
        }
        return $str;
    }
}
