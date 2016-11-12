<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <script type="text/javascript" src="/Public/Admin/jquery/jquery.js"></script>
    <script type="text/javascript" src="/Public/Admin/validate/jquery.js"></script>
    <script type="text/javascript" src="/Public/Admin/validate/dist/jquery.validate.js"></script>
    <script type="text/javascript" src="/Public/Admin/validate/dist/localization/messages_zh.js"></script>
    <title>Document</title>
    <style>
        .error{
            color:red;

        }
    </style>
</head>
<body>
<form action="<?php echo U('Index/index');?>" method="post" id="myform">
   <label for="uname">用户名</label>
    <input type="text" id="uname" name="uname" class="required" ><br/>
    <label for="upwd">密码</label>
    <input type="text" id="upwd" name="upwd" class="required"  ><br/>
    <input type="submit" name="submit" value="提交"/>
</form>
<script type="text/javascript">
    $(document).ready(function() {
        $("#myform").validate({
            rules: {
                uname:{
                    required:true,
                    minlength: 2,
                },
               upwd: {
                    required: true

                }
            },
            messages: {
                uname: {
                    required: "此项必填",
                    minlength:"用户名不少于2个字符"
                },
                upwd: {
                    required: "请输入密码"
                }
            }
        });
    });
</script>
</body>
</html>