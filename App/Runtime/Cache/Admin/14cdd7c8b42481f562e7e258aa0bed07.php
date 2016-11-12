<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    用户名：<?php echo (session('name')); ?>;
    用户名：<?php echo $_SESSION['name'] ?>
<a href="<?php echo U('Public/logout');?>">退出</a>
</body>
</html>