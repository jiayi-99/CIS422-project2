<?php


namespace Admin\Controller;


class UserController extends AuthController
{

    /*列表*/
    public function list1(){
        $where=[];
        $nickname=I("nickname");
        if($nickname){
            $where["nickname"]=["like",["%{$nickname}%"]];
            $this->assign('nickname', $nickname);
        }
        $count = count(M("user")->where($where)->select());
        $pageReady = new \Think\Pagination ($count, 20);
        $pageReady->parameter['nickname'] = $nickname;
        $user = M("user")->where($where)->limit($pageReady->firstRow . ',' . $pageReady->listRows)->order('id desc')->select();
        $page = $pageReady->show();
        $list=[];
        foreach ($user as $key=>$val) {
            $list[$key]=$val;
            $list[$key]["createtime"]=date("Y-m-d H:i:s",$val["createtime"]);
        }
        $this->assign('page', $page);
        $this->assign('list', $list);
        $this->display();
    }

}