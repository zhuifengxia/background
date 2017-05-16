<?php namespace Modules\Backend\Http\Controllers;
/**
 * 题库后台登录
 * User: 刘单风
 * DateTime: 2016/6/2 17:10
 * CopyRight：医库软件PHP小组
 */
use Pingpong\Modules\Routing\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use BackendAuth;
use Backend;

class AuthController extends Controller {

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $username = 'username';
    protected $redirectTo = '/backend';

    protected $loginView = 'backend::auth.login';
    protected $guard = 'backend';
	
}