<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<body>
<form action="<?php echo U('Index/checkbox');?>" method="post">
    <input type="checkbox" value="1" name="week[]" > 周一
    <input type="checkbox"  value="2" name="week[]" > 周二
    <input type="checkbox"  value="3" name="week[]" > 周三
    <input type="checkbox"  value="4" name="week[]" > 周四
    <input type="checkbox"  value="5" name="week[]" > 周五
    <input type="checkbox"  value="6" name="week[]" > 周六
    <input type="checkbox"  value="7" name="week[]" > 周日
    <button type="submit">提交</button>
</form>
</body>
</html>