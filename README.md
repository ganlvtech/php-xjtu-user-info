# 西安交通大学统一身份认证用户信息获取接口

## 使用方法

```php
<?php
use PhpXjtuUserInfo\XjtuUserInfo;

require './vendor/autoload.php';
$config = require 'config.php';

$xjtuUserInfo = new XjtuUserInfo($config['url'], $config['auth']);
$result = $xjtuUserInfo->getInfoByNetId('zhangsan');
var_dump($result);
$result = $xjtuUserInfo->getInfoByStuId('2333333333');
var_dump($result);
$result = $xjtuUserInfo->getInfoByName('张三');
var_dump($result);
$result = $xjtuUserInfo->getInfoByMobile('13333333333');
var_dump($result);
```

## 返回格式

因为NetId和学号是唯一的，所以直接返回关联数组

使用姓名查询的时候统一在外面再套一层序列数组

鉴于大部分人的手机号都是唯一的，我们使用原样返回，即：只有一个结果时返回关联数组，有多个结果时再套一层索引数组

## 全部字段

全部字段均为string类型或null

| 字段 | 说明 |
| :---: | :--- |
| birthday | 生日 |
| classid | 班级名称 |
| dep | 学院名称 |
| depid | 学院id |
| email | E-mail |
| gender | 性别（“男”或“女”） |
| idcardname | 证件类型（一般为“身份证”） |
| idcardno | 证件号码 |
| marriage | “已婚”或“未婚” |
| mobile | 手机号码 |
| nation | 民族 |
| nationplace | 籍贯 |
| polity | 政治面貌（“中国共产主义青年团”“中国共产党党员”等） |
| roomnumber | 宿舍地址 |
| roomphone | 宿舍电话（一般为null） |
| speciality | 专业名称 |
| studenttype | 考生类型（“统考本科生”等） |
| tutoremployeeid | 导师姓名 |
| userid | NetId |
| username | 姓名 |
| userno | 学号 |
| usertype | 身份（具体不详，可能与是教师还是学生有关） |

## LICENSE

    The MIT License (MIT)
    
    Copyright (c) 2017 eeyes.net
    
    Permission is hereby granted, free of charge, to any person obtaining a copy
    of this software and associated documentation files (the "Software"), to deal
    in the Software without restriction, including without limitation the rights
    to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
    copies of the Software, and to permit persons to whom the Software is
    furnished to do so, subject to the following conditions:
    
    The above copyright notice and this permission notice shall be included in all
    copies or substantial portions of the Software.
