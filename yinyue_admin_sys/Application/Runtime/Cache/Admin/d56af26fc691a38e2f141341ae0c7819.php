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
                <a><i class="fa fa-list"></i> <span class="nav-label">user Management</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <?php if(auth_check('User/list1',session('admin.id'))): ?><li <?php echo CONTROLLER_NAME=='User'&&ACTION_NAME=='list1' ? 'class="active"' : ""; ?> >
                        <a href="/admin.php/User/list1">user list</a>
                        </li><?php endif; ?>
                </ul>
                </li><?php endif; ?>


            <?php if(auth_check('Singer',session('admin.id'))): ?><li <?php if((CONTROLLER_NAME) == "Singer"): ?>class="active"<?php endif; ?> >
                <a><i class="fa fa-list"></i> <span class="nav-label">singer management</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <?php if(auth_check('Singer/list1',session('admin.id'))): ?><li <?php echo CONTROLLER_NAME=='Singer'&&ACTION_NAME=='list1' ? 'class="active"' : ""; ?> >
                        <a href="/admin.php/Singer/list1">singer list</a>
                        </li><?php endif; ?>
                </ul>
                </li><?php endif; ?>


            <?php if(auth_check('Song',session('admin.id'))): ?><li <?php if((CONTROLLER_NAME) == "Song"): ?>class="active"<?php endif; ?> >
                <a><i class="fa fa-list"></i> <span class="nav-label">song management</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <?php if(auth_check('Song/list1',session('admin.id'))): ?><li <?php echo CONTROLLER_NAME=='Song'&&ACTION_NAME=='list1' ? 'class="active"' : ""; ?> >
                        <a href="/admin.php/Song/list1">song list</a>
                        </li><?php endif; ?>
                </ul>
                </li><?php endif; ?>









    <?php if(auth_check('System',session('admin.id'))): ?><li <?php if((CONTROLLER_NAME) == "System"): ?>class="active"<?php endif; ?> >
		<a><i class="fa fa-list"></i> <span class="nav-label">system Management</span> <span class="fa arrow"></span></a>
		<ul class="nav nav-second-level">
			<?php if(auth_check('System/admin',session('admin.id'))): ?><li <?php echo CONTROLLER_NAME=='System'&&ACTION_NAME=='admin' ? 'class="active"' : ""; ?> >
					<a href="/admin.php/System/admin">administrator list</a>
				</li><?php endif; ?>
<!--			<?php if(auth_check('System/auth_group',session('admin.id'))): ?>-->
<!--				<li <?php echo CONTROLLER_NAME=='System'&&ACTION_NAME=='auth_group' ? 'class="active"' : ""; ?> >-->
<!--					<a href="/admin.php/System/auth_group">角色列表</a>-->
<!--				</li>-->
<!--<?php endif; ?>-->
<!--			<?php if(auth_check('System/auth_rule',session('admin.id'))): ?>-->
<!--				<li <?php echo CONTROLLER_NAME=='System'&&ACTION_NAME=='auth_rule' ? 'class="active"' : ""; ?> >-->
<!--				<a href="/admin.php/System/auth_rule">规则列表</a>-->
<!--				</li>-->
<!--<?php endif; ?>-->
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

		<h2>

            Administrator list

<!--			<a href="/admin.php/System/admin_operation" class="btn btn-primary pull-right">添加管理员</a>-->

		</h2>

		<ol class="breadcrumb">



		<li>

            System Management

		</li>

		<li>

			<a>Administrator list</a>

		</li>		

		</ol>

	</div>

</div>







<div class="wrapper wrapper-content animated fadeIn">

	<div class="row">

		

<div class="col-lg-12">

	

	<div class="ibox float-e-margins">

		

		<div class="ibox-title">

			<h5>Administrator list</h5>

		</div>

				

		<div class="ibox-content" style="display: block;">

			<table class="table table-hover">

				<thead>

					<tr>

						

						<th>ID</th>

						<th>account number</th>

						<th>name</th>

						<th>Roles</th>

						<th>status</th>

						<th>Creation time</th>

<!--						<th>操作</th>-->

					</tr>

				</thead>

		 		<tbody>

		 			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "No data" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>

		 				

						<td><span class="label label-success"><?php echo ($vo['id']); ?></span></td>

						<td><?php echo ($vo['account']); ?></td>

						<td><?php echo ($vo['name']); ?></td>

						<td><?php echo ($vo['auth_group']); ?></td>

						<td>

							<?php switch($vo['status']): case "0": ?><span style="color: green;">normal</span><?php break;?>
							    <?php case "1": ?><span style="color: red;">Disable</span><?php break; endswitch;?>
						</td>

						<td><?php echo (date("Y-m-d H:i:s",$vo['createtime'])); ?></td>


					</tr><?php endforeach; endif; else: echo "No data" ;endif; ?>

				</tbody>

			</table>

				



			<div style="text-align: right;">

				<?php echo ($page); ?>

			</div>

		

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


<script src="/Public/hplus/static/js/plugins/layer/laydate/laydate.js"></script>

<script>

function del(del){

	if(window.confirm('Are you sure you want to delete it？')){

        window.location.href=del;

        return true;

     }else{

        return false;

    }

}

</script>

</body>



</html>