<?php
/**
 * User: 刘单风
 * DateTime: 2016/6/3 13:56
 * CopyRight：医库软件PHP小组
 */
namespace Modules\Backend\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Pingpong\Modules\Routing\Controller;
use Modules\Backend\Entities\User;
use Validator;
use ValidationException;
class UsersController extends Controller {

    /**
     * 管理用户列表
     * @return 用户数据集合
     */
	public function index() {
        $result = [
            'users' => User::paginate(1)
        ];
		return backendView('users.index',$result);
	}

    /**
     * 编辑/添加用户管理账号
     * @param int $userid 用户ID/添加不需要传此参数
     * @return view
     */
    public function createuser($userid=0){

        //获得要编辑的用户信息
        $user = empty($userid) ? new User():User::find($userid);

        //页面跳转
        return backendView('users.createuser',['user'=>$user]);
    }

    /**
     * 编辑/添加用户管理账号保存提交
     * @param int $userid 用户ID/添加不需要传此参数
     * @return view
     */
    public function createPost($userid=0){

        //验证提交数据信息
        $valied = [
            'username'		=>	'required|max:255',
            'password'	=> 'required|max:255',
            'userinfo'			=>	'required',
            'userlarvel'			=>	'required'
        ];
        $validate = Validator::make(post(), $valied ,[
            'username.required'		=>'用户名不能为空',
            'password.required'	=>'密码不能为空',
            'userlarvel.required'		=>'用户权限必须选择'
        ]);

        if( $validate->fails() ) {
            return redirect('/backend/users/create')->with(['userid'=>$userid,'errors' => $validate->errors()]);
        }

        $user = $userid ? User::find($userid) : new User();

        //存入数据库操作
        $user->username   = post('username');
        $user->password   = Hash::make(post('password'));
        $user->userinfo   = post('userinfo');
        $user->userlarvel = post('userlarvel');
        $res = $user->save();

        return redirect('/backend/users');
    }
	
}