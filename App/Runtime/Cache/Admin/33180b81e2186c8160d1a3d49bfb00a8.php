<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<body>
<form action="<?php echo U('Index/index');?>"  >
    标题:<input type="text" name="title" placeholder="标题" value="" />
    内容：<input type="text" name="content" />
    <button type="submit">搜索</button>
</form>
<table>
    <thead>
        <tr>
            <th>序号</th>
            <th>标题</th>
            <th>内容</th>
        </tr>
    </thead>
    <tbody>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vi): $mod = ($i % 2 );++$i;?><tr>
            <td>    <if condition="$name eq 1 "> value1    <elseif condition="$name eq 2"/>value2        <else /> value3    </if></td>
            <td><?php echo ($i); ?></td>
            <td><?php echo ($vi["title"]); ?></td>
            <td><?php echo (msubstr($vi["content"],0,30)); ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
</table>

</body>
</html>