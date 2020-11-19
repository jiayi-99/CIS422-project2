<?php

namespace Admin\Controller;

use Admin\services\AddRuleService;
use Admin\services\AuthRuleService;
use Admin\services\OperateLogService;
use Admin\services\RuleDetailService;

class SystemController extends AuthController
{

    public function admin()
    {
        $where = array();
        $where["status"]=0;
        $where["type"]=0;
        $count = count(M("admin")->where($where)->select());
        $pageReady = new \Think\Pagination ($count, 20);
//		$pageReady->parameter['name'] = urldecode(I('name'));

        $list = M("admin")->where($where)->limit($pageReady->firstRow . ',' . $pageReady->listRows)->order('id desc')->select();
        $page = $pageReady->show();
        foreach ($list as &$val) {
            $val['auth_group'] = M('auth_group')->where("id='%s'", $val['auth_group_id'])->getField('title');
        }

        $this->assign('page', $page);
        $this->assign('list', $list);

        $this->display();
    }

    public function admin_operation()
    {

        $this->assign("auth_group", M('auth_group')->where(array("status"=>1))->select());
        if (I('id') != null) {
            $this->assign("form", M('admin')->where("id=" . I('id'))->find());
        }

        $this->display();
    }

    public function admin_add()
    {
        $data = array();
        $data = I('post.');
        $data['createtime'] = time();
        $data['password'] = md5(I('post.password'));
        $addid = M("admin")->add($data);

        //添加权限关系表
        $data = array();
        $data['uid'] = $addid;
        $data['group_id'] = I('post.auth_group_id');
        M('auth_group_access')->add($data);

        $this->success("帐号管理添加成功", "admin");
    }

    /*帐号管理编辑*/
    public function admin_edit()
    {
        $data = array();
        $data = I('post.');
        if (I('post.___password') != I('post.password')) {
            $data['password'] = md5(I('post.password'));
        }

        $where = array();
        $where['id'] = I('post.id');
        M('admin')->where($where)->save($data);

        //修改权限规则
        M('auth_group_access')->where(array("uid" => I('post.id')))->setField('group_id', I('post.auth_group_id'));

        $this->success("帐号管理编辑成功", "admin");
    }

    public function admin_delete()
    {
        $id = intval(I('id'));

        $status = M('admin')->where("id='$id'")->getField('status');

        M('admin')->where("id='$id'")->setField('status', $status ^ 1);

        $this->success("帐号管理设置成功", "admin");
    }

    /*角色管理*/
    public function auth_group()
    {
        $where = array();
        $where["status"]=1;
        $count = count(M("auth_group")->where($where)->select());
        $pageReady = new \Think\Pagination ($count, 20);

        $list = M("auth_group")->where($where)->limit($pageReady->firstRow . ',' . $pageReady->listRows)->order('id desc')->select();
        $page = $pageReady->show();
        for ($i = 0; $i < count($list); $i++) {
        }

        $this->assign('page', $page);
        $this->assign('list', $list);

        $this->display();
    }

    /*角色管理操作*/
    public function auth_group_operation()
    {
        $auth_rule = M('auth_rule')->where("parentid=0")->select();

        $where = [];
//        $where["title"] = array('neq', 100);
        for ($i = 0; $i < count($auth_rule); $i++) {
            $where["parentid"] = $auth_rule[$i]['id'];
            $auth_rule[$i]['auth_rule'] = M('auth_rule')->where($where)->select();
        }
        $this->assign("auth_rule", $auth_rule);

//        $auth_rule = M("auth_rule")->where(["title" => 100])->getField("id", true);

        if (I('id') != null) {
            $auth_group=M('auth_group')->where("id=" . I('id'))->find();
            $auth_group_arr=explode(",",$auth_group["rules"]);
            foreach ($auth_group_arr as $auth_group_arr_key=>$auth_group_arr_value){
                if (in_array($auth_group_arr_value,$auth_rule)){
                    unset($auth_group_arr[$auth_group_arr_key]);
                }
            }
            $auth_group["rules"]=implode(',',$auth_group_arr);
//            $this->assign("form", M('auth_group')->where("id=" . I('id'))->find());
            $this->assign("form", $auth_group);
        }

        $this->display();
    }

    /*角色管理添加添加*/
    public function auth_group_add()
    {
        $data = array();
        $data = I('post.');
        $data['createtime'] = time();
        if ($data['icon'] == "") {
            unset($data['icon']);
        };
        $data["rules"] = $_POST['rules'];
        M("auth_group")->add($data);
        $this->success("角色管理添加成功", "auth_group");

    }

    /*角色管理编辑编辑*/
    public function auth_group_edit()
    {
        $data['rules'] = array();

        $result = M("auth_rule")->where(["title" => 100])->getField("id", true);

        $data = I('post.');
        $data['rules'] = $_POST['rules'];
        $data['rules'] = $data['rules'] . "," . implode(',', $result);
        $where = array();
        $where['id'] = I('post.id');
        M('auth_group')->where($where)->save($data);
        $this->success("角色管理编辑成功", "auth_group");
    }

    public function system_config_operation()
    {
        $data = M('system_config')->order('id desc')->find();
        $auto_reply = M('system_more_config')->where(array('name' => 'auto_reply'))->getField('content');

        $data['auto_reply'] = $auto_reply;
        $this->assign('form', $data);

        $this->display();
    }

    public function system_config_edit()
    {
        $id = intval(I('id'));
        $data = [];
        $data = I('post.');
        $data['cash_money_min'] = I('cash_money_min');
        $data['cash_money_rate'] = I('cash_money_rate');
        $data['instructions'] = $_POST['instructions'];
        $data['guides'] = $_POST['guides'];
        $data['notice_promotion'] = $_POST['notice_promotion'];
        $data['rule_cash'] = $_POST['rule_cash'];
        $data['rule_return'] = $_POST['rule_return'];
        $data['admission_notice'] = $_POST['admission_notice'];
        $data['weixin_sh'] = $_POST['weixin_sh'];
        $data['re_commander'] = $_POST['re_commander'];
        $data['award_notice'] = $_POST['award_notice'];
        $data['score_rule'] = $_POST['score_rule'];
        $data['lottery_rule'] = $_POST['lottery_rule'];
        $data['auto_reply'] = $_POST['auto_reply'];
        $data['user_rule'] = $_POST['user_rule'];
        $data['apply_note'] = $_POST['apply_note'];
        //由于使用的配置项，长度有限
        if ($data['auto_reply']) {
            if (M('system_more_config')->where(array('name' => 'auto_reply'))->find()) {
                M('system_more_config')->where(array('name' => 'auto_reply'))->setField('content', $_POST['auto_reply']);
            } else {
                M('system_more_config')->add(array('name' => 'auto_reply', 'content' => $_POST['auto_reply']));
            }
        }

        if ($id) {
            M('system_config')->where(['id' => $id])->save($data);
        } else {
            M('system_config')->add($data);
        }

        $this->success("系统配置项编辑成功", "system_config_operation");
    }


    /**
     * 获取规则列表
     */
    public function auth_rule()
    {

        $where = array();
        $new_list=[];
        $count = count(M("auth_rule")->where($where)->select());
        $pageReady = new \Think\Pagination ($count, 20);

        $list = M("auth_rule")->where($where)->limit($pageReady->firstRow . ',' . $pageReady->listRows)->order('id desc')->select();
        $page = $pageReady->show();
        for ($i = 0; $i < count($list); $i++) {
            //获取分类名称
            $auth_rule=M("auth_rule")->find($list[$i]["parentid"]);
            $list[$i]["parent_name"]=$auth_rule["title"];
            $list[$i]["createtime"]=date("Y-m-d H:i:s",$list[$i]["createtime"]);
        }

        $this->assign('page', $page);
        $this->assign('list', $list);

        $this->display();

    }


    public function auth_rule_operation()
    {
        $info_copy=M("auth_rule")->where(["parentid" => 0])->select();
        $this->assign("auth_rule",$info_copy);
        if (I('id') != null) {
            $info=M('auth_rule')->where("id=" . I('id'))->find();
            $this->assign("form", $info);
        }

        $this->display();
    }

    /*角色管理添加添加*/
    public function auth_rule_add()
    {
        $data = I('post.');
        $data["status"]=intval(I("status"));
        $data['createtime'] = time();
        M("auth_rule")->add($data);
        $this->success("规则添加成功", "auth_rule");
    }

    /*角色管理编辑编辑*/
    public function auth_rule_edit()
    {
        $data = I('post.');
//        unset($data["parentid"]);
        $where = array();
        $where['id'] = I('post.id');
        M('auth_rule')->where($where)->save($data);
        $this->success("规则编辑成功", "auth_rule");
    }


    /**
     * 添加规则
     */
    public function addRule()
    {
        $data = I("post.");
        $AddRuleService = new AddRuleService();
        $AddRuleService->addRule($data);
        echo json_encode(array("msg" => "ok", "code" => 0));
    }


    /**
     * 获取操作日记记录列表
     */
    public function operateLog()
    {
        $page = $_GET["page"];
        $pageSize = $_GET["pageSize"];
        $description = $_GET["description"];
        if (!isset($page) || !isset($pageSize)) {
            throw new \RuntimeException("参数不够，请检查");
        }
        $OperateLogService = new OperateLogService();
        $result = $OperateLogService->operateLog($page, $pageSize,$description);
        echo json_encode(array("data" => $result, "msg" => "ok", "code" => 0));
    }


}
