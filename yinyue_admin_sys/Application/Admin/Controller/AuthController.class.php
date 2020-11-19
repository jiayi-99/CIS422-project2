<?php

namespace Admin\Controller;
/*
 * 权限控制
 * */

use Think\Controller;

class AuthController extends Controller
{
    protected $redis;

    public function __construct()
    {
        parent::__construct();
        //登录验证
        if (login_check() == false) {
            $this->error("重新登录", U('Login/login'));
        }

        //权限验证
        if (!auth_check(CONTROLLER_NAME . '/' . ACTION_NAME, session("admin.id"))) {

            $this->error("您没有权限执行当前操作" . CONTROLLER_NAME . '/' . ACTION_NAME);
        }
    }

}
