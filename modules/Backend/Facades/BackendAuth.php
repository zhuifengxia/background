<?php
/**
 * User: 刘单风
 * DateTime: 2016/6/2 17:15
 * CopyRight：医库软件PHP小组
 */
namespace Modules\Backend\Facades;

use Illuminate\Support\Facades\Facade as FacadeParent;

class BackendAuth extends FacadeParent {

    protected static function getFacadeAccessor()
    {
        return "backend.auth";
    }
}
