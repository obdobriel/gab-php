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

Interface Handle
{
    /**
       * 应用启动注册
     *
       * @param  [type] $app [description]
       * @return [type]      [description]
       */
    public function register(App $app);
}
