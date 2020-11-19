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




<link href="/Public/webuploader/webuploader.css" rel="stylesheet">

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

            <?php if($form['id'] != null): ?><h2>Edit song</h2>

                <?php else: ?>

                <h2>Add song</h2><?php endif; ?>

            <ol class="breadcrumb">



                <li>

                    <?php if($form['id'] != null): ?><strong>Edit song</strong>

                        <?php else: ?>

                        <strong>Add song</strong><?php endif; ?>

                </li>

            </ol>

        </div>

    </div>







    <div class="wrapper wrapper-content animated">

        <div class="row">



            <div class="col-lg-12">



                <div class="ibox float-e-margins">



                    <div class="ibox-title">

                        <?php if($form['id'] != null): ?><h5>Edit song</h5>

                            <?php else: ?>

                            <h5>Add song</h5><?php endif; ?>





                        <div class="ibox-tools">

                            <a class="collapse-link">

                                <i class="fa fa-chevron-up"></i>

                            </a>



                            <a class="close-link">

                                <i class="fa fa-times"></i>

                            </a>

                        </div>

                    </div>



                    <div class="ibox-content layui-form" style="display: block;">

                        <?php if($form['id'] != null): ?><form autocomplete="off" action="/admin.php/Song/edit_Song" method="post" class="form-horizontal">

                                <input type="hidden" name="id" value="<?php echo ($form["id"]); ?>" />



                                <?php else: ?>



                                <form autocomplete="off" action="/admin.php/Song/add_Song" method="post" class="form-horizontal"><?php endif; ?>



                                                <div class="form-group layui-form">

                                                    <label class="col-sm-2 control-label">singer</label>

                                                    <div class="col-sm-10 col-lg-3">

                                                        <select name="singer_id" class="form-control" lay-search="" lay-filter="select">
                                                            <option value="">Direct selection or search selection</option>
                                                            <?php if(is_array($singer_list)): $i = 0; $__LIST__ = $singer_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['id']); ?>" <?php if(($form['singer_id']) == $vo['id']): ?>selected="selected"<?php endif; ?> ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

                                                        </select>


                                                    </div>

                                                </div>


                        <div class="form-group">

                            <label class="col-sm-2 control-label">name</label>

                            <div class="col-sm-10 col-lg-3">

                                <input name="name" id="" type="text" value="<?php echo ($form['name']); ?>" class="form-control"  placeholder="Please enter a name" />

                            </div>

                        </div>






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




<script type="text/javascript" src="/Public/webuploader/webuploader.js"></script>
<script src="/Public/hplus/static/js/plugins/layer/laydate/laydate.js"></script>
<script src="/Public/hplus/static/js/plugins/layer/laydate/laydate.js"></script>
<script src="/Public/hplus/static/js/plugins/layer/laydate/laydate.js"></script>
<script src="/Public/hplus/static/js/plugins/layer/laydate/laydate.js"></script>
<script src="/Public/hplus/static/js/plugins/layer/laydate/laydate.js"></script>

<script>

    layui.use('form',function(){
        var form = layui.form;
    });

    upimg('logo_btn','logo_img','logo_progressbar','logo');
    function upimg(upbuttonid,showimgid,progressbar,inputimage){



        // Web Uploader实例

        var uploader;



        // 初始化Web Uploader

        uploader = WebUploader.create({



            // 自动上传。

            auto : true,



            // swf文件路径

            swf : '/Public/webuploader/Uploader.swf',



            // 文件接收服务端。

            server : '/admin.php/Common/uploadimg',



            // 选择文件的按钮。可选。

            // 内部根据当前运行是创建，可能是input元素，也可能是flash.

            pick : "#"+upbuttonid,



            // 只允许选择文件，可选。

            accept : {

                title : 'Images',

                extensions : 'gif,jpg,jpeg,bmp,png',

                mimeTypes : 'image/*'

            },



        });



        // 当有文件添加进来的时候

        uploader.on('fileQueued', function(file) {

            var $img = $('#'+showimgid);

            // 创建缩略图

            uploader.makeThumb(file, function(error, src) {

                if (error) {

                    $img.replaceWith('<span>不能预览</span>');

                    return;

                }

                $img.attr('src', src);

                //缩略图显示大小

            }, 100, 100);

        });



        // 文件上传过程中创建进度条实时显示。

        uploader.on('uploadProgress', function(file, percentage) {

            var $li = $('#'+progressbar), $percent = $li.find('.progress span');



            // 避免重复创建

            if (!$percent.length) {

                $percent = $('<p class="progress"><span></span></p>').appendTo(

                    $li).find('span');

            }



            $percent.css('width', percentage * 100 + '%');

        });



        // 文件上传成功，给item添加成功class, 用样式标记上传成功。

        uploader.on('uploadSuccess', function(file,response) {

            $('#'+progressbar).addClass('upload-state-done');

            if(response.status == 200){

                $("#"+inputimage).val(response.pic_url);

                //设置图片新地址

                $("#"+showimgid).attr("src",response.pic_url);



                $("#"+inputimage).val(response.pic_url);

            }else{



            }

        });



        // 文件上传失败，现实上传出错。

        uploader.on('uploadError', function(file) {

            var $li = $('#'+progressbar), $error = $li.find('div.error');

            // 避免重复创建

            if (!$error.length) {

                $error = $('<div class="error"></div>').appendTo($li);

            }

            $error.text('上传失败');

        });



        // 完成上传完了，成功或者失败，先删除进度条。

        uploader.on('uploadComplete', function(file) {

            $('#'+progressbar).find('.progress').remove();

        });

    }

    layui.use('upload', function(){
        var $ = layui.jquery
            ,upload = layui.upload;

        //普通图片上传
        var uploadInst = upload.render({
            elem: '#tubiao'
            ,url: '/admin.php/Common/uploadimg' //改成您自己的上传接口
            ,before: function(obj){
                //预读本地文件示例，不支持ie8
                obj.preview(function(index, file, result){
                    $('#new_logo').attr('src', result); //图片链接（base64）
                });
            }
            ,done: function(res){
                //如果上传失败
                layer.msg(res.msg);
                if(res.status ==200){
                    $('#demoText').hide();
                    $("#logo_div").show();
                    $("#logo").val(res.pic_url);
                }
                //上传成功
            }
            ,error: function(){
                //演示失败状态，并实现重传
                var demoText = $('#demoText');
                demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-xs demo-reload">重试</a>');
                demoText.find('.demo-reload').on('click', function(){
                    uploadInst.upload();
                });
            }
        });

    });


</script>

</body>



</html>