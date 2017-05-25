<?php
/***********************************
 *             Gab PHP             *
 *                                 *
 * A light php framework for study *
 *                                 *
 *             Gabriel             *
 *  <https://github.com/obdobriel> *
 *                                 *
 ***********************************/

namespace Framework;

/**
* 请求
*/
class Request
{
	/**
     * 请求模块
     * @var string
     */
    private $_module = '';

    /**
     * 请求控制器
     * @var string
     */
    private $_controller = '';

    /**
     * 请求操作
     * @var string
     */
    private $_action = '';

    /**
     * 请求环境参数
     * @var array
     */
    private $_serverParams = [];

    /**
     * 请求所有参数
     * @var array
     */
    private $_requestParams = [];

    /**
     * 请求GET参数
     * @var array
     */
    private $_getParams = [];

    /**
     * 请求POST参数
     * @var array
     */
    private $_postParams = [];

	/**
	 * 构造
	 */
	function __construct()
	{
		$this->_serverParams = $_SERVER;
		$this->_requestParams = $_REQUEST;
		$this->_getParams = $_GET;
		$this->_postParams = $_POST;
	}

	/**
     * 魔法函数__get
     * @param  string $name 属性名称
     * @return mixed
     */
    public function __get($name = '')
    {
        $name = '_'.$name;
        return $this->$name;
    }

    /**
     * 魔法函数__set
     * @param  string $name  属性名称
     * @param  string $value 属性值
     * @return mixed
     */
    public function __set($name = '', $value = '')
    {
        $name = '_'.$name;
        $this->$name = $value;
    }

    /**
     * 获取GET参数
     * @param  string $value 参数名
     * @return mixed
     */
    public function get($value = '')
    {
        return isset($this->_getParams[$value]) ? $this->_getParams[$value] : '';
    }

    /**
     * 获取POST参数
     * @param  string $value 参数名
     * @return mixed
     */
    public function post($value = '')
    {
        return isset($this->_postParams[$value]) ? $this->_postParams[$value] : '';
    }

    /**
     * 获取REQUEST参数
     * @param  string $value 参数名
     * @return mixed
     */
    public function request($value = '')
    {
        return isset($this->_requestParams[$value]) ? $this->_requestParams[$value] : '';
    }

    /**
     * 获取SERVER参数
     * @param  string $value 参数名
     * @return mixed
     */
    public function getServer($value = '')
    {
        return isset($this->_serverParams[$value]) ? $this->_serverParams[$value] : '';
    }
}
