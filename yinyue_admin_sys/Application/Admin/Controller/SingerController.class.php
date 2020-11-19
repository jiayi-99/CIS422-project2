<?php


namespace Admin\Controller;


class SingerController extends AuthController
{

    /*列表*/
    public function list1(){
        $where=[];
        $name=I("name");
        if($name){
            $where["name"]=["like",["%{$name}%"]];
            $this->assign('name', $name);
        }
        $count = count(M("Singer")->where($where)->select());
        $pageReady = new \Think\Pagination ($count, 20);
        $pageReady->parameter['name'] = $name;
        $user = M("Singer")->where($where)->limit($pageReady->firstRow . ',' . $pageReady->listRows)->order('id desc')->select();
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

    /*歌手操作*/
    public function Singer_operation()
    {
        if (I('id') != null) {
            $info = M('Singer')->where("id=" . I('id'))->find();
            $this->assign("form", $info);
        }
        $this->display();
    }

    /*添加歌手*/
    public function add_Singer()
    {
        $data = I('post.');
        $data["createtime"]=time();
        M("Singer")->add($data);
        $this->success("添加成功", "list1");
    }

    /*编辑歌手*/
    public function edit_Singer()
    {
        $data = I('post.');
        $where = array();
        $where['id'] = I('post.id');
        M('Singer')->where($where)->save($data);
        $this->success("编辑成功", "list1");
    }

    /*删除歌手*/
    public function del_Singer()
    {
        $id = intval(I("id"));
        M('Singer')->where(array("id" => $id))->delete();
        $this->success("删除成功", "list1");
    }

}