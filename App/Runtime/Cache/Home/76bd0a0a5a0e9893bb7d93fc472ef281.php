<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php if(is_array($msg)): $i = 0; $__LIST__ = $msg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$show): $mod = ($i % 2 );++$i; echo ($show["name"]); ?><br /><?php endforeach; endif; else: echo "" ;endif; ?>
<?php echo ($page); ?>
</body>
</html>