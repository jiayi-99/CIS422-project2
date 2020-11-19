<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <title>Management background</title>
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
				<span class="m-r-sm text-muted welcome-message"><a href="index.html" title="Back to homepage"><i class="fa fa-home"></i></a>Hello，<?php echo session("admin.name"); ?>，Welcome to login</span>
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
					<i class="fa fa-sign-out"></i> drop out
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

                user list

<!--                <a href="/admin.php/User/xinxi_operation" class="btn btn-primary pull-right">添加</a>-->

<!--                <div style="width: 100px;margin-right: 20px;" class="pull-right">-->
<!--                    <a type="button" class="btn btn-primary pull-right" id="danhao"><i class="layui-icon"></i>导入信息</a>-->
<!--                    <a style="margin-top: 10px;font-size: 14px;color: #888888;" id="muban">模板Excel下载</a>-->
<!--                </div>-->

<!--                <a onclick="export_data()" class="btn btn-primary pull-right" STYLE="margin-right: 10px;">导出数据</a>-->

            </h2>

            <ol class="breadcrumb">



                <li>

                    User Management

                </li>

                <li>

                    <a>user list</a>

                </li>

            </ol>

        </div>

    </div>



    <div class="row wrapper border-bottom white-bg page-heading">

        <form action="" method="post" class="col-lg-12 form-horizontal" style="line-height: 48px;">

            <input id="nickname" name="nickname" value="<?php echo ($nickname); ?>" class="form-control layer-date" placeholder="nickname" />

            <button class="btn btn-primary m-t m-l-sm">search for</button>

        </form>

    </div>



    <div class="wrapper wrapper-content animated fadeIn">

        <div class="row">



            <div class="col-lg-12">



                <div class="ibox float-e-margins">



                    <div class="ibox-title">

                        <h5>user list</h5>

                    </div>



                    <div class="ibox-content" style="display: block;">

                        <table class="table table-hover">

                            <thead>

                            <tr>

                                <th>ID</th>

                                <th>nickname</th>

                                <th>account</th>

                                <th>Creation time</th>

<!--                                <th>operating</th>-->

                            </tr>

                            </thead>

                            <tbody>

                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "暂无数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>

                                    <td><?php echo ($vo['id']); ?></td>

                                    <td><?php echo ($vo['nickname']); ?></td>

                                    <td><?php echo ($vo['account']); ?></td>

                                    <td><?php echo ($vo['createtime']); ?></td>

                                    <td>

<!--                                        <a href="/admin.php/User/xinxi_operation?id=<?php echo ($vo["id"]); ?>" class="btn btn-xs btn-success"> 编辑</a>-->

<!--                                        <a href="/admin.php/User/del_xinxi?id=<?php echo ($vo["id"]); ?>" class="btn btn-xs btn-success"> 删除</a>-->

                                    </td>

                                </tr><?php endforeach; endif; else: echo "暂无数据" ;endif; ?>

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
<script src="/Public/sheetjs/shim.min.js"></script>
<script src="/Public/sheetjs/xlsx.full.min.js"></script>



</body>



</html>