<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <title>管理后台</title>
    <meta name="keywords" content="乌托邦">
    <meta name="description" content="乌托邦">
    <!--<link rel="icon" type="image/png" href="/logo.ico">-->
    <link rel="icon" type="image/png" href="/Public/image/logo.jpg">
    <link rel="icon" type="image/png" href="">
    <link href="/Public/hplus/static/js/plugins/layui/css/layui.css" rel="stylesheet">
<link href="/Public/hplus/static/css/bootstrap.min.css?v=3.3.0" rel="stylesheet">
<link href="/Public/hplus/static/font-awesome/css/font-awesome.css?v=4.3.0" rel="stylesheet">
<link href="/Public/hplus/static/css/animate.css" rel="stylesheet">
<link href="/Public/hplus/static/css/style.css?v=2.1.0" rel="stylesheet">
<link href="/Public/css/cascader.css" rel="stylesheet">
    <style>
        .layui-form-switch{
            margin-top: 0px;
        }
        h2{
            font-size: 18px;
        }
        .page-heading{
            padding-bottom: 10px;
        }
        .layui-form-checkbox[lay-skin=primary]{
            padding-left: 0px !important;
        }

</style>
</head>


<body>
	<!--侧边栏导航开始-->
<nav class="navbar-default navbar-static-side" role="navigation">
	<div class="sidebar-collapse">
		<ul class="nav" id="side-menu">
			<li class="nav-header">

				<div class="dropdown profile-element">
					<span>
			            <img alt="image" src="/Public/image/logo.jpg" width="100%" />
			       </span>
				</div>
				<div class="logo-element">
					BMS
				</div>

			</li>


            <?php if(auth_check('User',session('admin.id'))): ?><li <?php if((CONTROLLER_NAME) == "User"): ?>class="active"<?php endif; ?> >
                <a><i class="fa fa-list"></i> <span class="nav-label">用户管理</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <?php if(auth_check('User/list1',session('admin.id'))): ?><li <?php echo CONTROLLER_NAME=='User'&&ACTION_NAME=='list1' ? 'class="active"' : ""; ?> >
                        <a href="/admin.php/User/list1">用户列表</a>
                        </li><?php endif; ?>
                </ul>
                </li><?php endif; ?>


            <?php if(auth_check('Singer',session('admin.id'))): ?><li <?php if((CONTROLLER_NAME) == "Singer"): ?>class="active"<?php endif; ?> >
                <a><i class="fa fa-list"></i> <span class="nav-label">歌手管理</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <?php if(auth_check('Singer/list1',session('admin.id'))): ?><li <?php echo CONTROLLER_NAME=='Singer'&&ACTION_NAME=='list1' ? 'class="active"' : ""; ?> >
                        <a href="/admin.php/Singer/list1">歌手列表</a>
                        </li><?php endif; ?>
                </ul>
                </li><?php endif; ?>


            <?php if(auth_check('Song',session('admin.id'))): ?><li <?php if((CONTROLLER_NAME) == "Song"): ?>class="active"<?php endif; ?> >
                <a><i class="fa fa-list"></i> <span class="nav-label">歌曲管理</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <?php if(auth_check('Song/list1',session('admin.id'))): ?><li <?php echo CONTROLLER_NAME=='Song'&&ACTION_NAME=='list1' ? 'class="active"' : ""; ?> >
                        <a href="/admin.php/Song/list1">歌曲列表</a>
                        </li><?php endif; ?>
                </ul>
                </li><?php endif; ?>









    <?php if(auth_check('System',session('admin.id'))): ?><li <?php if((CONTROLLER_NAME) == "System"): ?>class="active"<?php endif; ?> >
		<a><i class="fa fa-list"></i> <span class="nav-label">系统管理</span> <span class="fa arrow"></span></a>
		<ul class="nav nav-second-level">
			<?php if(auth_check('System/admin',session('admin.id'))): ?><li <?php echo CONTROLLER_NAME=='System'&&ACTION_NAME=='admin' ? 'class="active"' : ""; ?> >
					<a href="/admin.php/System/admin">管理员列表</a>
				</li><?php endif; ?>
			<?php if(auth_check('System/auth_group',session('admin.id'))): ?><li <?php echo CONTROLLER_NAME=='System'&&ACTION_NAME=='auth_group' ? 'class="active"' : ""; ?> >
					<a href="/admin.php/System/auth_group">角色列表</a>
				</li><?php endif; ?>
			<?php if(auth_check('System/auth_rule',session('admin.id'))): ?><li <?php echo CONTROLLER_NAME=='System'&&ACTION_NAME=='auth_rule' ? 'class="active"' : ""; ?> >
				<a href="/admin.php/System/auth_rule">规则列表</a>
				</li><?php endif; ?>
		</ul>
	</li><?php endif; ?>



		</ul>
	</div>
</nav>
<!--侧边栏导航结束-->

        
        <div id="page-wrapper" class="gray-bg" style="min-height: 720px;">
        
			<header class="row border-bottom">
	<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
		<div class="navbar-header">
			<a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
		</div>
		<ul class="nav navbar-top-links navbar-right">
			<li>
				<span class="m-r-sm text-muted welcome-message"><a href="index.html" title="返回首页"><i class="fa fa-home"></i></a>您好，<?php echo session("admin.name"); ?>，欢迎登录后台</span>
			</li>
			<!--<li class="dropdown">
				<a class="dropdown-toggle count-info" data-toggle="dropdown" href="index.html#">
					<i class="fa fa-envelope"></i> <span class="label label-warning">16</span>
				</a>
			</li>
			<li class="dropdown">
				<a class="dropdown-toggle count-info" data-toggle="dropdown" href="index.html#">
					<i class="fa fa-bell"></i> <span class="label label-primary">8</span>
				</a>
			</li>-->
			<li>
				<a href="/admin.php/Login/login_out">
					<i class="fa fa-sign-out"></i> 退出
				</a>
			</li>
		</ul>
	</nav>
</header>

<div id="message_inform" style="position: fixed; bottom: -160px; right: 16px; z-index: 999999999; width: 240px; height: auto; text-align: center; background-color: #F6F6F6; border: 1px solid #666666; border-radius: 3px; transition: width 1s linear 2s; -moz-transition: all 1s; -webkit-transition: all 1s; -o-transition: all 1s;">
	<div style="line-height: 32px; background-color: #2A3542; color: white;">消息通知</div>
	<div id="push_message" style="line-height: 24px; box-sizing: border-box; padding: 8px; text-align: left; color: #2A3542;">
	</div>
</div>
    

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-12">
		<?php if($form['id'] != null): ?><h2>角色管理编辑</h2>
		<?php else: ?>
			<h2>角色管理添加</h2><?php endif; ?>
		<ol class="breadcrumb">
			
			<li>
				<?php if($form['id'] != null): ?><strong>角色管理编辑</strong>
				<?php else: ?>
					<strong>角色管理添加</strong><?php endif; ?>
			</li>
		</ol>
	</div>
</div>



<div class="wrapper wrapper-content animated">
	<div class="row">
		
<div class="col-lg-12">
	
	<div class="ibox float-e-margins">
		
		<div class="ibox-title">
			<?php if($form['id'] != null): ?><h5>角色管理编辑</h5>
			<?php else: ?>
				<h5>角色管理添加</h5><?php endif; ?>
			
			
			<div class="ibox-tools">
				<a class="collapse-link">
					<i class="fa fa-chevron-up"></i>
				</a>
		
				<a class="close-link">
					<i class="fa fa-times"></i>
				</a>
			</div>
		</div>
				
		<div class="ibox-content" style="display: block;">
			<?php if($form['id'] != null): ?><form autocomplete="off" action="/admin.php/System/auth_group_edit" method="post" class="form-horizontal">
				<input type="hidden" name="id" value="<?php echo ($form["id"]); ?>" />
				
			<?php else: ?>
			
			<form autocomplete="off" action="/admin.php/System/auth_group_add" method="post" class="form-horizontal"><?php endif; ?>




<div class="form-group">
	<label class="col-sm-2 control-label">角色名称</label>
	<div class="col-sm-10 col-lg-6">
		<input name="title" id="" type="text" value="<?php echo ($form['title']); ?>" class="form-control"  placeholder="请输入角色名称" />
	</div>
</div>


<div class="form-group">
	<label class="col-sm-2 control-label">状态</label>
	<div class="col-sm-10 col-lg-3">
		<select name="status" class="form-control">
			<option value="1" <?php if(($form['status']) == "1"): ?>selected="selected"<?php endif; ?> >正常</option>
			<option value="0" <?php if(($form['status']) == "0"): ?>selected="selected"<?php endif; ?> >禁用</option>
		</select>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">规则权限</label>
	
	<div class="col-sm-10 col-lg-8" style="line-height: 40px;">
		<?php if(is_array($auth_rule)): $i = 0; $__LIST__ = $auth_rule;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div style="border: 1px solid #CCCCCC; padding: 16px; margin-bottom: 8px;">
				<label style="margin-right: 16px; margin-bottom: 0px; vertical-align: top;">
					<input onclick="check_rules()" name="rules_id" type="checkbox" value="<?php echo ($vo['id']); ?>" <?php if(in_array($vo['id'],explode(',',$form['rules']))): ?>checked="checked"<?php endif; ?> /> <!--<?php echo ($vo['name']); ?>--> <?php echo ($vo['title']); ?>
				</label>
				<div style=""></div>
				<?php if(is_array($vo['auth_rule'])): $i = 0; $__LIST__ = $vo['auth_rule'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><label style="margin-right: 16px; margin-bottom: 0px; vertical-align: top;">
						<input onclick="check_rules()" name="rules_id" type="checkbox" value="<?php echo ($v['id']); ?>" <?php if(in_array($v['id'],explode(',',$form['rules']))): ?>checked="checked"<?php endif; ?> /> <!--<?php echo ($vo['name']); ?>--> <?php echo ($v['title']); ?>
					</label><?php endforeach; endif; else: echo "" ;endif; ?>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	
</div>

<input type="hidden" name="rules" id="rules" value="<?php echo ($form['rules']); ?>" />

<!--<div class="form-group">
	<label class="col-sm-2 control-label">规则权限</label>
	<div class="col-sm-10 col-lg-8">
		<script id="rules" name="rules" type="text/plain" style="width:100%;height:420px;"><?php echo ($form['rules']); ?></script>
	</div>
</div>-->
				
				<div class="hr-line-dashed"></div>
				
				<div class="form-group">
					<div class="col-sm-4 col-sm-offset-2">
						<button class="btn btn-primary" type="submit">提交</button>
						<span class="btn btn-white" onclick="window.location.reload()">取消</span>
					</div>
				</div>

			</form>
		</div>
		              
	</div>
	
</div>

	</div>
</div>

			<div class="footer">
	<div class="pull-right">
		By：<a href="#" target="_blank">管理后台</a>
	</div>
	<div>
		<strong>Copyright</strong> 管理后台 &copy; 2020
	</div>
</div>
  
            
        </div>

	<script src="/Public/hplus/static/js/jquery-2.1.1.min.js"></script>
<script src="/Public/hplus/static/js/bootstrap.min.js"></script>

<script src="/Public/hplus/static/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/Public/hplus/static/js/hplus.js"></script>

<script src="/Public/hplus/static/js/plugins/pace/pace.min.js"></script>

<!--<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>-->
<!--<script src="https://unpkg.com/axios/dist/axios.min.js"></script>-->
<!--<script src="https://cdn.bootcss.com/qs/6.5.1/qs.min.js"></script>-->
<!--<script src="/Public/index/js/vue.js"></script>-->
<!--<script src="/Public/index/js/axios.js"></script>-->
<!--<script src="/Public/index/js/qs.js"></script>-->
<!--<script src="https://cdn.bootcss.com/layer/2.3/layer.js"></script>-->
<script src="/Public/hplus/static/js/plugins/layui/layui.js" charset="utf-8"></script>


	<script charset="utf-8" src="/Public/ueditor/ueditor.config.js"></script>	
	<script charset="utf-8" src="/Public/ueditor/ueditor.all.min.js"></script>	
	<script type="text/javascript" charset="utf-8" src="/Public/ueditor/lang/zh-cn/zh-cn.js"></script>	
	
<script>
	var ue_rules = UE.getEditor('rules');

function check_rules(){
	var rules = '';
	$('input[name="rules_id"]:checked').each(function(){
		rules=rules+$(this).val()+',';
	});
	$('#rules').val(rules.substring(0,rules.length-1));
}

</script>
</body>

</html>