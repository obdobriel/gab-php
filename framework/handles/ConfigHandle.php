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

namespace Framework\Handles;

use Framework\App;
use Framework\Handles\Handle;
use Framework\Exceptions\CoreHttpException;

class ConfigHandle implements Handle
{
	/**
     * 框架实例
     *
     * @var object
     */
    private $app;

    /**
     * 构造函数
     */
    public function __construct()
    {
        # code...
    }

    /**
     * 魔法函数__get.
     *
     * @param string $name 属性名称
     *
     * @return mixed
     */
    public function __get($name = '')
    {
        return $this->$name;
    }

    /**
     * 魔法函数__set.
     *
     * @param string $name  属性名称
     * @param mixed  $value 属性值
     *
     * @return mixed
     */
    public function __set($name = '', $value = '')
    {
        $this->$name = $value;
    }

    public function register(App $app)
    {
		$this->app = $app;
		$app::$container->setSingle('config', $this);
		$this->loadConfig($app);
    }

    public function loadConfig(App $app)
    {
    	$config = require($app->rootPath . '/framework/config/common.php');

    	$database = require($app->rootPath . '/framework/config/database.php');

    	$this->config = array_merge($config, $database);
    }
}
