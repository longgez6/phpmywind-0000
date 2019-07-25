<?php require(dirname(__FILE__).'/include/config.inc.php');
//留言内容处理
if(isset($action) and $action=='add')
{
        if(empty($name) or
           empty($content))
        {
                header('location:message.php');
                exit();
        }


        $r = $dosql->GetOne("SELECT Max(orderid) AS orderid FROM `#@__message`");
        $orderid  = (empty($r['orderid']) ? 1 : ($r['orderid'] + 1));
        $nickname = htmlspecialchars($name);
		$qq = htmlspecialchars($qq);
		$email = htmlspecialchars($email);
		$title = htmlspecialchars($title);
        $contact  = htmlspecialchars($contact);
        $content  = htmlspecialchars($content);
        $posttime = GetMkTime(time());
        $ip       = gethostbyname($_SERVER['REMOTE_ADDR']);


        $sql = "INSERT INTO `#@__message` (siteid, nickname, contact, qq, email, title, content, orderid, posttime, htop, rtop, checkinfo, ip) VALUES (1, '$nickname', '$contact', '$qq', '$email', '$title', '$content', '$orderid', '$posttime', '', '', 'false', '$ip')";
        if($dosql->ExecNoneQuery($sql))
        {
                ShowMsg('留言成功，感谢您的支持！','message.php');
                exit();
        }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<?php echo GetHeader(1,0,0,'客户留言'); ?>
<link href="css/f_w.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function cfm_msg()
{
		if($("#name").val() == "")
        {
                alert("请填写姓名！");
                $("#name").focus();
                return false;
        }
		if($("#contact").val() == "")
        {
                alert("请填写联系方式！");
                $("#contact").focus();
                return false;
        }
        if($("#title").val() == "")
        {
                alert("请填写标题！");
                $("#title").focus();
                return false;
        }
        if($("#content").val() == "")
        {
                alert("请填写留言内容！");
                $("#content").focus();
                return false;
        }
        $("#form").submit();
}
</script>
</head>
<body>
<!-- 头部 -->
<?php require_once('_top.php'); ?>
<!-- 顶部幻灯片 -->
<?php require_once('_n_banner.php'); ?>
<!-- 左侧 -->
<?php require_once('_left.php'); ?>
<!-- 当前位置 -->
<h2>在线留言</h2>
<span>您的当前位置：<a href="/">首页</a> > 在线留言</span>
<!-- 内容 -->
            <form name="form" id="form" method="post" action="">
            	<table border="0" cellpadding="0" cellspacing="0" class="message">
                    <tr>
                        <td width="12%" align="right">姓名：</td>
                        <td width="88%"><input  name="name" id="name"  type="text" size="40" class="message-text" /> <font color="#FF0000">*</font>（必填）</td>
                    </tr>
    
                    <tr>
                        <td align="right"> ＱＱ：</td>
                        <td><input name="qq" type="text" size="40" class="message-text" /></td>
                    </tr>
    
                    <tr>
                        <td align="right">邮箱：</td>
                        <td><input name="email" type="text" size="40" class="message-text" /></td>
                    </tr>
    
                    <tr>
                        <td align="right">电话：</td>
                        <td><input name="contact" id="contact" type="text" size="40" class="message-text" /> <font color="#FF0000">*</font>（必填）</td>
                    </tr>
                    <tr>
                        <td align="right">产品：</td>
                        <td><input name="title" id="title" type="text" size="40" class="message-text" /> <font color="#FF0000">*</font>（必填）</td>
                    </tr>
                    <tr>
                        <td align="right">内容：</td>
                        <td><textarea name="content" id="content" cols="45" rows="8" class="message-text" style=" width:400px; height:125px;"></textarea></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <input type="submit" name="button" id="button2" value="提交反馈" class="message-submit" onclick="cfm_msg();return false;"/>
                            <input type="reset" class="message-reset" value="重 置" />
                            <input type="hidden" name="action" id="action" value="add" />
                        </td>
                    </tr>
                </table>
              </form>
<!-- 底部 -->
<?php require_once('_foot.php'); ?>
</body>
</html>