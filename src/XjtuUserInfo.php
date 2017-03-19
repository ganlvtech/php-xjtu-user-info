<?php
namespace PhpXjtuUserInfo;

use SoapClient;

class XjtuUserInfo
{
    protected $url;
    protected $auth;

    /**
     * XjtuUserInfo constructor.
     *
     * @param string $url
     * @param callable $auth
     */
    public function __construct($url, $auth)
    {
        $this->url = $url;
        $this->auth = $auth;
    }

    /**
     * @param string $net_id
     *
     * @return array
     */
    public function getInfoByNetId($net_id)
    {
        return $this->soapCall('getInfoById', array(
            'uid' => $net_id,
        ));
    }

    /**
     * @param string $func_name
     * @param array $params
     *
     * @return array
     */
    protected function soapCall($func_name, $params = array())
    {
        $client = new SoapClient($this->url);
        $params['auth'] = ($this->auth)($func_name, $params);
        $result = $client->__soapCall($func_name, array($params));
        if (!$result || !property_exists($result, 'return')) {
            return null;
        }
        return $result->return;
    }

    /**
     * @param string $stu_id
     *
     * @return array
     */
    public function getInfoByStuId($stu_id)
    {
        return $this->soapCall('getInfoByNo', array(
            'sno' => $stu_id,
        ));
    }

    /**
     * @param string $name
     *
     * @return array
     */
    public function getInfoByName($name)
    {
        return self::toArray($this->soapCall('getInfoByName', array(
            'sname' => $name,
        )));
    }

    /**
     * @param mixed $arr
     *
     * @return array
     */
    public static function toArray($arr)
    {
        if (is_null($arr)) {
            return array();
        } elseif (is_array($arr) && !self::isAssoc($arr)) {
            return $arr;
        } elseif (is_object($arr)) {
            return array(get_object_vars($arr));
        }
        return array($arr);
    }

    /**
     * @param array $arr
     *
     * @return bool
     */
    public static function isAssoc($arr)
    {
        if (array() === $arr) {
            return false;
        }
        return array_keys($arr) !== range(0, count($arr) - 1);
    }

    /**
     * @param string $mobile
     *
     * @return array
     */
    public function getInfoByMobile($mobile)
    {
        return $this->soapCall('getInfoByMobile', array(
            'mobile' => $mobile,
        ));
    }
}
