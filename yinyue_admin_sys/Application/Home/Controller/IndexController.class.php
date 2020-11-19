<?php


namespace Home\Controller;


use Think\Controller;

class IndexController extends Controller
{


    public function index(){

    }

    /*注册*/
    public function zhuce(){
        $this->display();
    }

    /*添加注册信息*/
    public function add_zhuce(){
        $nickname=I("nickname");
        $sex=I("sex");
        $account=I("account");
        $password=I("password");
        $data=[];
        $data["nickname"]=$nickname;
        $data["sex"]=$sex;
        $data["account"]=$account;
        $data["password"]=md5($password);
        $data["createtime"]=time();
        //判断当前的账户是否存在
        $user=M("user")->where(array("account"=>$account))->find();
        if (!$user){
            M("user")->add($data);
            echo json_encode(array("msg"=>"registration success","code"=>200));
            exit;
        }else{
            echo json_encode(array("msg"=>"account already exists","code"=>-100));
            exit;
        }
    }

    /*登录*/
    public function login(){
        $this->display();
    }

    /*音乐信息展示*/
    public function yinyue(){
        $this->display();
    }

    /*登录判断*/
    public function login_check(){
        $account=I("account");
        $password=I("password");
        $user=M("user")->where(array("account"=>$account))->find();
        if (!$user){
            echo json_encode(array("msg"=>"account does not exist","code"=>-100));
            exit;
        }
        $user=M("user")->where(array("account"=>$account,"password"=>md5($password)))->find();
        if (!$user){
            echo json_encode(array("msg"=>"Incorrect account or password","code"=>-100));
            exit;
        }
        echo json_encode(array("msg"=>"login successful","data"=>$user,"code"=>200));
        exit;
    }

    /*获取歌曲列表*/
    public function gequ_list(){
        $name=I("name");
        $where=[];
        if ($name){
            $where["name"]=["like","%{$name}%"];
        }
        $song=M("song")->where($where)->select();
        $list=[];
        foreach ($song as $key=>$value){
            $list[$key]=$value;
            //获取歌手
            $singer=M("singer")->where(array("id"=>$value["singer_id"]))->find();
            $list[$key]["singer_name"]=$singer["name"];
        }
        echo json_encode(array("msg"=>"successful","data"=>$list,"code"=>200));
        exit;
    }

    /*收藏歌曲*/
    public function shoucang(){
        $user_id=I("user_id");
        $song_id=I("song_id");
        $data=[];
        $data["user_id"]=$user_id;
        $data["song_id"]=$song_id;
        $data["createtime"]=time();

        //判断是否已经收藏
        $user_favorites=M("user_favorites")->where(array("user_id"=>$user_id,"song_id"=>$song_id))->find();
        if (!$user_favorites){
            M("user_favorites")->add($data);
        }
        echo json_encode(array("msg"=>"collection success","data"=>$data,"code"=>200));
        exit;

    }

    /*获取我收藏的歌曲*/
    public function my_shoucang_list(){
        $user_id=I("user_id");
        $where=[];
        $where["user_id"]=$user_id;
        $user_favorites=M("user_favorites")->where($where)->select();
        $list=[];
        foreach ($user_favorites as $key=>$value){
            $list[$key]=$value;
            //获取歌曲信息
            $song=M("song")->where(array("id"=>$value["song_id"]))->find();
            //获取歌手信息
            $singer=M("singer")->where(array("id"=>$song["singer_id"]))->find();
            $list[$key]["song_name"]=$song["name"];
            $list[$key]["singer_name"]=$singer["name"];
        }
        echo json_encode(array("msg"=>"successful","data"=>$list,"code"=>200));
        exit;
    }


    /*删除我的收藏*/
    public function del_shoucang(){
        $id=I("id");
        M("user_favorites")->where(array("id"=>$id))->delete();
        echo json_encode(array("msg"=>"successfully deleted","code"=>200));
        exit;
    }





}