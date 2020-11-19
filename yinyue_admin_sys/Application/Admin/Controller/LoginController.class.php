<?php


namespace Admin\Controller;


use Think\Controller;

class LoginController extends Controller
{

    /**
     * 登录
     */
    public function login()
    {
        $this->display();
    }


    /**
     * 登录操作方法
     */
    public function ajax_login()
    {
        $data = I('post.');
        //验证账号密码是否正确
        //对密码进行加密处理
        $new_pwd = md5($data["password"]);
        if (empty($data["username"])) {
            $this->error('用户名不能为空！', "login");
        }
        if (empty($data["password"])) {
            $this->error('密码不能为空！', "login");
        }
        $admin = M("admin")->where(array("account" => $data["username"], "password" => $new_pwd, "status" => 0))->find();
        if ($admin) {
            session('admin.id', $admin['id']);
            session('admin.name', $admin['name']);
            $Value = $_SESSION['admin']['id'] . ';' . $_SESSION['admin']['name'];
            $key = 'wer';
            $str = md5($Value . $key);
            $str = $str . ':' . $Value;
            setcookie('admin_login', $str, time() + 60 * 60 * 24, '/');
            $this->login_log();
            if ($admin["type"]==1){
                $this->success("登录成功", U('User/list1', "", ""));
            }
            if ($admin["type"]==2){
                $this->success("登录成功", U('User/list1', "", ""));
            }
            if ($admin["type"]==3){
                $this->success("登录成功", U('Approver/list', "", ""));
            }
            if ($admin["type"]==0){
                $this->success("登录成功", U('User/list1', "", ""));
            }

        } else {
            $this->error('用户名或密码错误！', "login");
        }
    }


    public function login_out()
    {
        session(null);
        cookie('admin_login', null);
        $this->success("退出成功", U("Login/login"));
    }

    /*登录记录写入*/
    protected function login_log()
    {
        $data = array();
        $data['ip'] = get_client_ip();
        $data['admin_id'] = session('admin.id');
        $data['login_time'] = date('Y-m-d H:i:s', time());
        M('log_admin')->add($data);
    }

    /*注册*/
    public function zhuce()
    {
        $account=I("account");
        $pwd=I("pwd");
        $pwd_r=I("pwd_r");
        $name=I("name");
        $phone=intval(I("phone"));
        $type=1;
        $data=[];
        if ($pwd_r!=$pwd){
            echo json_encode(array("code"=>200,"msg"=>"密码不一致"));
            exit;
        }
        $data["name"]=$name;
        $data["account"]=$account;
        $data["type"]=$type;
        $data["phone"]=$phone;
        $data["password"]=md5($pwd);
        $data["createtime"]=time();
        //判断账号是否存在
        $admin=M("admin")->where(array("account"=>$account))->find();
        if (!$admin){
            //说明可以注册
                //添加到用户表
            $data["auth_group_id"]=18;
            $id=M("admin")->add($data);
            M("auth_group_access")->add(array("uid"=>$id,"group_id"=>18));
            M("user")->add($data);
            echo json_encode(array("code"=>200,"msg"=>"注册成功"));
            exit;

        }else{
            echo json_encode(array("code"=>-100,"msg"=>"账号已存在"));
        }


    }


}