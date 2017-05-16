<?php
/**
 * User: 刘单风
 * DateTime: 2016/6/2 17:17
 * CopyRight：医库软件PHP小组
 */

namespace Modules\Backend\Classes\Auth;

use Illuminate\Contracts\Auth\Authenticatable;
use Modules\System\Support\Errors;
use Request;
use Debugbar;
use Session;
use Cookie;
use Module;
use Illuminate\Contracts\Auth\Guard as GuardImplements;

class Manager implements GuardImplements {

    use Errors;

    private $app;

    protected $userModel = 'Modules\Backend\Entities\User';

    public $ipAddress = '0.0.0.0';

    protected $sessionKey = 'iOpenShopBackendAuth';

    protected $permissions = [];

    public function __construct( $app )
    {
        $this->app = $app;
        $this->loadPermissions();
    }

    public function getPermissions()
    {
        return $this->permissions;
    }

    protected function loadPermissions()
    {
        $modules = Module::all();

        $permissions = [];

        foreach( $modules as $module ) {
            if( !$module->active() ) continue;

            $module_code = $module->getLowerName();
            $module_name = config($module_code . '.name');

            $conf = config($module_code . '.permissions');

            $permissions[$module_code]  = (object)[
                'label' => $module_name,
                'permissions'   => []
            ];

            if( !empty($conf) ) {
                $permissions[$module_code]->permissions = $conf;
            }
        }

        return $this->permissions = $permissions;
    }

    protected function init()
    {
        $this->ipAddress = Request::ip();
    }

    /**
     * @return GuardImplements
     */
    public function backendAuth()
    {
        return Auth('backend');
    }

    public function user()
    {
        return $this->backendAuth()->user();
    }

    public function check()
    {
        return $this->backendAuth()->check();
    }

    /**
     * Determine if the current user is a guest.
     *
     * @return bool
     */
    public function guest()
    {
        return $this->backendAuth()->guest();
    }

    /**
     * Get the ID for the currently authenticated user.
     *
     * @return int|null
     */
    public function id()
    {
        return $this->backendAuth()->id();
    }

    /**
     * Validate a user's credentials.
     *
     * @param  array $credentials
     * @return bool
     */
    public function validate(array $credentials = [])
    {
        return $this->backendAuth()->validate( $credentials );
    }

    /**
     * Set the current user.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable $user
     * @return void
     */
    public function setUser(Authenticatable $user)
    {
        $this->backendAuth()->setUser( $user );
    }
}
