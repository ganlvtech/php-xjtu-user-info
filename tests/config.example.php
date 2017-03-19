<?php
return [
    'url' => '', // 出于保密原因，接口地址不在此处写出
    'auth' => function ($func_name, $params) {
        // 出于保密原因，验证具体算法不在此处写出
        // 此处的算法仅为示例
        $app_id = '';
        ksort($params);
        return $app_id . sha1($app_id . $func_name . json_encode($params));
    },
];
