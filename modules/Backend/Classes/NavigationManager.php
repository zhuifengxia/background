<?php namespace Modules\Backend\Classes;

use Module;
use Event;

class NavigationManager {

    protected $callbacks = [];

    protected $items = [];

    protected static $mainItemDefaults = [
        'code'        => null,
        'label'       => null,
        'icon'        => null,
        'url'         => null,
        'permissions' => [],
        'order'       => 500,
        'sideMenu'    => []
    ];

    protected static $sideItemDefaults = [
        'code'        => null,
        'label'       => null,
        'icon'        => null,
        'url'         => null,
        'counter'     => null,
        'counterLabel'=> null,
        'order'       => -1,
        'attributes'  => [],
        'permissions' => [],
        'sideMenu'    => []
    ];

    public function __construct()
    {
        $this->loadItems();
    }

    protected function loadItems()
    {
        $items = Module::all();

        /*
         * Load module items
         */
        foreach ($this->callbacks as $callback) {
            $callback($this);
        }

        foreach( $items as $item ) {

            if( !$item->active() ) continue;

            $module_name = $item->getLowerName();

            $conf = config($module_name . '.navigation');
            if( empty($conf) ) continue;

            $this->registerMenuItems( $module_name, $conf );
        }

        Event::fire('backend.navigation.extendItems', [$this]);
    }

    public function registerMenuItems(  $module_name, array $conf )
    {
        if( !$this->items ) {
            $this->items = [];
        }

        foreach( $conf as $code => $val ) {
            $item = (object)  array_merge(self::$mainItemDefaults, array_merge($val, [
                'code'  => $code,
                'module'    => $module_name
            ]));

            foreach( $item->sideMenu as $sideMenuItemCode  => $sideMenuVal ) {
                if( empty($sideMenuVal ) ) continue;
                $subitem = (object) array_merge(
                    self::$sideItemDefaults,
                    array_merge($sideMenuVal, [
                        'code'  => $sideMenuItemCode,
                        'module'    => $module_name
                    ])
                );

                foreach( $subitem->sideMenu as $sideSubItemCode => $subItemVal ) {
                    if( empty($subItemVal) ) continue;
                    $nitem = (object) array_merge(
                        self::$sideItemDefaults,
                        array_merge($subItemVal, [
                            'code'  => $sideSubItemCode,
                            'module'  => $module_name
                        ])
                    );

                    $subitem->sideMenu[$sideSubItemCode] = $nitem;
                }
                $item->sideMenu[$sideMenuItemCode] = $subitem;
            }

            $itemKey = $this->makeItemKey( $module_name, $code );
            $this->items[$itemKey] = $item;
        }
    }

    public function makeItemKey($module_name, $code)
    {
        return strtoupper($module_name).'.'.strtoupper($code);
    }

    public function all()
    {
        return $this->items;
    }

    public function registerCallback(callable $callback)
    {
        $this->callbacks[] = $callback;
    }
}
