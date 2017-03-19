<?php
use PhpXjtuUserInfo\XjtuUserInfo;

require '../vendor/autoload.php';

if (!isset($_GET['service']) || (strpos($_GET['service'], 'eeyes.net') !== 0)) {
    // 一个简单的身份验证
    http_response_code(403);
    exit;
}

$config = require 'config.php';

$xjtuUserInfo = new XjtuUserInfo($config['url'], $config['auth']);
$result = null;
if (isset($_GET['net_id'])) {
    $result = $xjtuUserInfo->getInfoByNetId($_GET['net_id']);
} elseif (isset($_GET['stu_id'])) {
    $result = $xjtuUserInfo->getInfoByStuId($_GET['stu_id']);
} elseif (isset($_GET['name'])) {
    $result = $xjtuUserInfo->getInfoByName($_GET['name']);
} elseif (isset($_GET['mobile'])) {
    $result = $xjtuUserInfo->getInfoByMobile($_GET['mobile']);
}

header('Content-Type: application/json');
echo json_encode($result);
