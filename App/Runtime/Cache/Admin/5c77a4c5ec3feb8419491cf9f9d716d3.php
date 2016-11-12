<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>序号</th>
        <th>姓名</th>
        <th>年龄</th>
    </tr>
    </thead>
    <tbody>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
        <td><?php echo ($i); ?></td>
        <td><?php echo ($v["name"]); ?></td>
        <td><?php echo ($v["age"]); ?></td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
</table>
<?php echo ($page); ?>
</body>
</html>