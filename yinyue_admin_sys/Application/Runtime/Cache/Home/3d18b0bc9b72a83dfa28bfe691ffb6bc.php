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
<div class="layui-form" style="width: 80%;margin: auto;margin-top: 50px;" id="app">

    <div>
        welcome：{{user.nickname}}
        <button type="button" class="layui-btn layui-btn-primary" @click="tuichu">drop out</button>
    </div>
    <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
        <ul class="layui-tab-title">
            <li class="layui-this">search Center</li>
            <li>my collection</li>
        </ul>
        <div class="layui-tab-content" style="height: 100px;">
            <div class="layui-tab-item layui-show">
                <div class="layui-form-item" style="width: 400px;display: inline-block;">
                    <label class="layui-form-label">name of the song</label>
                    <div class="layui-input-block">
                        <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="Please enter the song name" class="layui-input" v-model="name">
                    </div>
                </div>
                <button type="button" class="layui-btn layui-btn-primary" @click="sousuo">search for</button>

                <div class="layui-form">
                    <table class="layui-table">
                        <colgroup>
                            <col width="150">
                            <col width="150">
                            <col width="200">
                            <col>
                        </colgroup>
                        <thead>
                        <tr>
                            <th>name of the song</th>
                            <th>Artist name</th>
                            <th>operating</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="item in gequ_list">
                            <td>{{item.name}}</td>
                            <td>{{item.singer_name}}</td>
                            <td>
                                <button type="button" class="layui-btn layui-btn-primary" @click="shoucang(item.id)">favorites</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="layui-tab-item">
<!--                <div class="layui-form-item" style="width: 400px;display: inline-block;">-->
<!--                    <label class="layui-form-label">歌曲名称</label>-->
<!--                    <div class="layui-input-block">-->
<!--                        <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入歌曲名称" class="layui-input">-->
<!--                    </div>-->
<!--                </div>-->
<!--                <button type="button" class="layui-btn layui-btn-primary">搜索</button>-->

                <div class="layui-form">
                    <table class="layui-table">
                        <colgroup>
                            <col width="150">
                            <col width="150">
                            <col width="200">
                            <col>
                        </colgroup>
                        <thead>
                        <tr>
                            <th>name of the song</th>
                            <th>artist name</th>
                            <th>operating</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="item in my_shoucang_list">
                            <td>{{item.song_name}}</td>
                            <td>{{item.singer_name}}</td>
                            <td>
                                <button type="button" class="layui-btn layui-btn-primary" @click="del(item.id)">delete</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



</div>

<script>
    layui.use(['form', 'layedit', 'laydate','element'], function(){
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
            user:JSON.parse(localStorage.getItem("user"))?JSON.parse(localStorage.getItem("user")):"",
            gequ_list:[],
            name:"",
            my_shoucang_list:[]
        },
        methods: {
            tijiao:function () {

                let nickname=$("#nickname").val();
                let sex = $('input[name="sex"]:checked').val();
                let account=$("#account").val();
                let password=$("#password").val();

                $.ajax({
                    type: "post",
                    url: "/Home.php/Index/add_zhuce",
                    data: {
                        nickname: nickname,
                        sex:sex,
                        account:account,
                        password:password
                    },
                    success: function (res) {
                        res=JSON.parse(res)
                        layer.alert(res.msg);
                    },
                });

            },
            zhuce:function () {
                window.location.href="/Home.php/Index/zhuce";
            },
            tuichu:function () {
                localStorage.clear();
                layer.msg("exit successfully");
                window.location.href="/Home.php/Index/login";
            },
            request:function () {
                let _this=this;
                $.ajax({
                    type: "get",
                    url: "/Home.php/Index/gequ_list",
                    data: {

                    },
                    success: function (res) {
                        res=JSON.parse(res)
                        _this.gequ_list=res.data;
                    },
                });

                $.ajax({
                    type: "get",
                    url: "/Home.php/Index/my_shoucang_list",
                    data: {
                        user_id:_this.user.id
                    },
                    success: function (res) {
                        res=JSON.parse(res)
                        _this.my_shoucang_list=res.data;
                    },
                });

            },
            sousuo:function () {
                let _this=this;
                $.ajax({
                    type: "get",
                    url: "/Home.php/Index/gequ_list",
                    data: {
                        name:_this.name
                    },
                    success: function (res) {
                        res=JSON.parse(res)
                        _this.gequ_list=res.data;
                    },
                });
            },
            shoucang:function (song_id) {
                let _this=this;
                $.ajax({
                    type: "get",
                    url: "/Home.php/Index/shoucang",
                    data: {
                        user_id:_this.user.id,
                        song_id:song_id
                    },
                    success: function (res) {
                        res=JSON.parse(res);
                        layer.msg(res.msg);
                        _this.request();
                    },
                });
            },
            del:function (id) {
                let _this=this;
                $.ajax({
                    type: "get",
                    url: "/Home.php/Index/del_shoucang",
                    data: {
                        id:id
                    },
                    success: function (res) {
                        res=JSON.parse(res);
                        layer.msg(res.msg);
                        _this.request();
                    },
                });
            }
        },
        mounted() {
            let _this = this;
            if (!localStorage.getItem("user")){
                // layer.msg("未登录，请登录");
                window.location.href="/Home.php/Index/login";
            }
            _this.request();
        }
    })

</script>


</body>
</html>