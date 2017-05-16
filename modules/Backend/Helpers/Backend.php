<?php

namespace Modules\Backend\Helpers;

use Redirect;

/**
 * User: 刘单风
 * DateTime: 2016/6/2 17:13
 * CopyRight：医库软件PHP小组
 */
class Backend {

    public function uri()
    {
        return '/backend';
    }

    public function redirectIntended($path, $status = 302, $helpers = [], $secure = null)
    {
        return Redirect::intended($this->uri() . '/' . $path, $status, $helpers, $secure);
    }
}
