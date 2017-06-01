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

namespace App\Demo\Controllers;

use Framework\App;
use Framework\Orm\Db\Mysql;

/**
 * Index Controller
 *
 * @desc default controller
 */
class Index
{
    public function __construct()
    {
    }

    public function Hello()
    {
        echo 'Hello Gab PHP';
    }

    /*
     * 演示
     *
     * @param   string $username 用户名
     * @param   string $password 密码
     * @example domain/Demo/Index/get?username=test&password=123456
     * @return  json
     */
    public function get()
    {
        return App::$container->getSingle('request')
                              ->get('password', '666');
    }

    /**
     * 框架内部调用演示
     *
     * 极大的简化了内部模块依赖的问题
     *
     * 可构建微单体建构
     *
     * @example domain/Demo/Index/micro
     * @return  json
     */
    public function micro()
    {
        return App::$app->get('demo/index/hello', [
            'user' => 'Gabriel'
        ]);
    }

    public function instance()
    {
        // 请求对象
        App::$container->getSingle('request');
        // 配置对象
        App::$container->getSingle('config');
        // redis对象
        App::$container->getSingle('redis');
        // memcache对象
        App::$container->getSingle('memcache');
        // mongodb对象
        App::$container->getSingle('mongodb');
    }

    public function test()
    {
        $request = App::$container->getSingle('request');
        return [
            'username' =>  $request->get('username', 'default value')
        ];
    }

    public function mysql()
    {
        $instance = new Mysql();
    }
}
