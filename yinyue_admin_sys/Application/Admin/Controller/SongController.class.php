<?php


namespace Admin\Controller;


class SongController extends AuthController
{

    /*列表*/
    public function list1(){
        $where=[];
        $name=I("name");
        if($name){
            $where["name"]=["like",["%{$name}%"]];
            $this->assign('name', $name);
        }
        $count = count(M("Song")->where($where)->select());
        $pageReady = new \Think\Pagination ($count, 20);
        $pageReady->parameter['name'] = $name;
        $user = M("Song")->where($where)->limit($pageReady->firstRow . ',' . $pageReady->listRows)->order('id desc')->select();
        $page = $pageReady->show();
        $list=[];
        foreach ($user as $key=>$val) {
            $list[$key]=$val;
            //获取歌手信息
            $singer=M("singer")->where(array("id"=>$val["singer_id"]))->find();
            $list[$key]["singer_name"]=$singer["name"];
            $list[$key]["createtime"]=date("Y-m-d H:i:s",$val["createtime"]);
        }
        $this->assign('page', $page);
        $this->assign('list', $list);
        $this->display();
    }

    /*歌曲操作*/
    public function Song_operation()
    {
        $singer=M("singer")->select();
        $this->assign("singer_list", $singer);
        if (I('id') != null) {
            $info = M('Song')->where("id=" . I('id'))->find();
            $this->assign("form", $info);
        }
        $this->display();
    }

    /*添加歌曲*/
    public function add_Song()
    {
        $data = I('post.');
        $data["createtime"]=time();
        M("Song")->add($data);
        $this->success("添加成功", "list1");
    }

    /*编辑歌曲*/
    public function edit_Song()
    {
        $data = I('post.');
        $where = array();
        $where['id'] = I('post.id');
        M('Song')->where($where)->save($data);
        $this->success("编辑成功", "list1");
    }

    /*删除歌曲*/
    public function del_Song()
    {
        $id = intval(I("id"));
        M('Song')->where(array("id" => $id))->delete();
        $this->success("删除成功", "list1");
    }

}