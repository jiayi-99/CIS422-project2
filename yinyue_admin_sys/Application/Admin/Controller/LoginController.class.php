<?php


namespace Admin\Controller;


use Think\Controller;

class LoginController extends Controller
{

  /**
      * log in
      */
    public function login()
    {
        $this->display();
    }


  
    public function ajax_login()
    {
        $data = I('post.');
      
        $new_pwd = md5($data["password"]);
        if (empty($data["username"])) {
            $this->error('Username can not be empty！', "login");
        }
        if (empty($data["password"])) {
            $this->error('password can not be blank!', "login");
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
                $this->success("login successful", U('User/list1', "", ""));
            }
            if ($admin["type"]==2){
                $this->success("login successful", U('User/list1', "", ""));
            }
            if ($admin["type"]==3){
                $this->success("login successful", U('Approver/list', "", ""));
            }
            if ($admin["type"]==0){
                $this->success("login successful", U('User/list1', "", ""));
            }

        } else {
            $this->error('wrong user name or password！', "login");
        }
    }


    public function login_out()
    {
        session(null);
        cookie('admin_login', null);
        $this->success("exit successfully", U("Login/login"));
    }

    
    protected function login_log()
    {
        $data = array();
        $data['ip'] = get_client_ip();
        $data['admin_id'] = session('admin.id');
        $data['login_time'] = date('Y-m-d H:i:s', time());
        M('log_admin')->add($data);
    }

    
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
            echo json_encode(array("code"=>200,"msg"=>"Inconsistent passwords"));
            exit;
        }
        $data["name"]=$name;
        $data["account"]=$account;
        $data["type"]=$type;
        $data["phone"]=$phone;
        $data["password"]=md5($pwd);
        $data["createtime"]=time();
        
        $admin=M("admin")->where(array("account"=>$account))->find();
        if (!$admin){
            //Description can be registered
                 //Add to user table
            $data["auth_group_id"]=18;
            $id=M("admin")->add($data);
            M("auth_group_access")->add(array("uid"=>$id,"group_id"=>18));
            M("user")->add($data);
            echo json_encode(array("code"=>200,"msg"=>"rigistar"));
            exit;

        }else{
            echo json_encode(array("code"=>-100,"msg"=>"Account already exists"));
        }


    }


}
