<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link href="/Public/hplus/static/js/plugins/layui/css/layui.css" rel="stylesheet">
    <script src="/Public/hplus/static/js/jquery-2.1.1.min.js"></script>
    <script src="/Public/hplus/static/js/plugins/layui/layui.js" charset="utf-8"></script>
    <script src="/Public/index/js/vue.js"></script>
</head>
<body>
<div class="layui-form" style="width: 60%;margin: auto;margin-top: 50px;" id="app">

    <div class="layui-form-item">
        <label class="layui-form-label">account</label>
        <div class="layui-input-block">
            <input type="text" id="account" lay-verify="title" autocomplete="off" placeholder="Please input Username" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">password</label>
        <div class="layui-input-block">
            <input type="password" id="password" lay-verify="title" autocomplete="off" placeholder="Please enter password" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <button type="submit" class="layui-btn" @click="tijiao">log in</button>
            <button type="button" class="layui-btn layui-btn-normal" id="LAY-component-form-getval" @click="zhuce">registered</button>
        </div>
    </div>

</div>

<script>
    layui.use(['form', 'layedit', 'laydate'], function(){
        var form = layui.form
            ,layer = layui.layer
            ,layedit = layui.layedit
            ,laydate = layui.laydate;

    });

    new Vue({
        el: '#app',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        data: {

        },
        methods: {
            tijiao:function () {
                let account=$("#account").val();
                let password=$("#password").val();
                if (!account){
                    layer.msg("账号不能为空");
                    return;
                }
                if (!password){
                    layer.msg("密码不能为空");
                    return;
                }
                $.ajax({
                    type: "post",
                    url: "/Home.php/Index/login_check",
                    data: {
                        account:account,
                        password:password
                    },
                    success: function (res) {
                        res=JSON.parse(res);
                        layer.msg(res.msg);
                        if (res.code==200){
                            localStorage.setItem("user",JSON.stringify(res.data));
                            window.location.href="/Home.php/Index/yinyue";
                        }

                    },
                });

            },
            zhuce:function () {
                window.location.href="/Home.php/Index/zhuce";
            }
        },
        mounted() {
            let _this = this;

        }
    })

</script>


</body>
</html>