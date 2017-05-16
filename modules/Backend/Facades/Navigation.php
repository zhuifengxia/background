<?php

namespace Modules\Backend\Facades;

use Illuminate\Support\Facades\Facade as FacadeParent;

class Navigation extends FacadeParent {
    protected static function getFacadeAccessor()
    {
        return "backend.navigation";
    }
}
