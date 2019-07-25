<?php require(dirname(__FILE__).'/include/config.inc.php');
//留言内容处理
if(isset($action) and $action=='add')
{
        if(empty($name) or
           empty($content))
        {
                header('location:Products_detail.php');
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
                ShowMsg('留言成功，感谢您的支持！','/');
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
<?php echo GetHeader(1,$cid,$id); ?>
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
<h2><?php echo GetCatName($cid); ?></h2>
<!-- 当前坐标 -->
<?php echo GetPosStr($cid); ?>
<!-- 点击量 -->
<?php
	//检测文档正确性
	$r = $dosql->GetOne("SELECT * FROM `#@__infoimg` WHERE id=$id");
	if(@$r)
	{
	//增加一次点击量
	$dosql->ExecNoneQuery("UPDATE `#@__infoimg` SET hits=hits+1 WHERE id=$id");
	$row = $dosql->GetOne("SELECT * FROM `#@__infoimg` WHERE id=$id");
?>
<!-- 组图 -->
<?php
	//判断显示缩略图或组图
	if(empty($row['picarr']))
	{
	?>
	
	<?php
	}
	else
	{
		$picarr = unserialize($row['picarr']);
?>
	<?php
		foreach($picarr as $k)
		{
			$v = explode(',', $k);
		?>
		<div class="contentdiv">
         <div class="dPic"><a><img src="<?php echo $v[0]; ?>" width="756" height="378" /></a> </div>
        </div>
	<?php
		}
	?>
	<?php
		foreach($picarr as $k)
		{
			$v = explode(',', $k);
			$i==1;
			$i++;
			$i<100;
		?>
		 <i class="toc"><a><img src="<?php echo $v[0]; ?>" width="146" height="73" /><em><?php echo $v[1]; ?></em></a></i>
	<?php
		}
	?>
<script type=text/javascript></script>
<?php
	}
?>		
<!-- 产品详细 -->
<img src="<?php echo $row['picurl']; ?>"/>
<h2><?php echo $row['title']; ?></h2>
所属分类：<?php echo GetCatName($cid); ?>
点击次数：<?php echo $row['hits']; ?>次
订购热线：<?php echo $cfg_info_hotline ;?>>
产品详情:<?php echo $row['content']; ?>
<!-- 翻篇 -->
<?php
	//获取上一篇信息
	$r = $dosql->GetOne("SELECT * FROM `#@__infoimg` WHERE classid=".$row['classid']." AND orderid<".$row['orderid']." AND delstate='' AND checkinfo=true ORDER BY orderid DESC");
	if($r < 1)
	{
		echo '<li>上一篇：已经没有了</li>';
	}
	else
	{
		if($cfg_isreurl != 'Y')
			$gourl = 'Products_detail.php?cid='.$r['classid'].'&id='.$r['id'];
		else
			$gourl = 'Products_detail-'.$r['classid'].'-'.$r['id'].'-1.html';

		echo '<li>上一篇：<a href="'.$gourl.'">'.$r['title'].'</a></li>';
	}
	
	//获取下一篇信息
	$r = $dosql->GetOne("SELECT * FROM `#@__infoimg` WHERE classid=".$row['classid']." AND orderid>".$row['orderid']." AND delstate='' AND checkinfo=true ORDER BY orderid ASC");
	if($r < 1)
	{
		echo '<li>下一篇：已经没有了</li>';
	}
	else
	{
		if($cfg_isreurl != 'Y')
			$gourl = 'Products_detail.php?cid='.$r['classid'].'&id='.$r['id'];
		else
			$gourl = 'Products_detail-'.$r['classid'].'-'.$r['id'].'-1.html';

		echo '<li>下一篇：<a href="'.$gourl.'">'.$r['title'].'</a></li>';
	}
?>
<!-- 留言订购 -->
                <h2 class="r-part1"><span>产品订购</span></h2>
                 <form name="form" id="form" method="post" action="">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="order">
                    <tr>
                        <td width="18%" align="right"><span>*</span>联系人</td>
                        <td width="82%"><input name="name" id="name" type="name" class="order-text" /> 请填写您的真实姓名 </td>
                    </tr>
                    <tr>
                        <td align="right"><span>*</span>手机号码</td>
                        <td><input name="contact" id="contact" type="contact" class="order-text" /> 请填写您的联系电话</td>
                    </tr>
                    <tr>
                        <td align="right">电子邮件</td>
                        <td><input name="email" type="email" id="email" class="order-text" /></td>
                    </tr>
                    <tr>
                        <td align="right"><span>*</span>采购意向描述</td>
                        <td><textarea name="content" id="content" cols="" rows="" class="order-text" style="width:450px; height:75px;"></textarea><br />请填写采购的产品数量和产品描述，方便我们进行统一备货。 </td>
                    </tr>
                    <tr>
                        <td align="right">&nbsp;</td>
                        <td>
                            <input name="button" type="submit" class="order-submit" value="提交" onClick="cfm_msg();return false;"/>
                            <input type="hidden" name="Title" value="<?php echo $row['title']; ?>" />
                            <input type="hidden" name="action" id="action" value="add" />
                        </td>
                    </tr>
                </table>
                </form>
<!-- 相关产品 -->
<?php
	$dosql->Execute("SELECT * FROM `#@__infoimg` WHERE (parentid=2 && classid=$cid) AND checkinfo=true ORDER BY posttime DESC LIMIT 0,3");
	while($row = $dosql->GetArray())
	{
	//获取链接地址
	if($row['linkurl']=='' and $cfg_isreurl!='Y')
		$gourl = 'products_detail.php?cid='.$row['classid'].'&id='.$row['id'];
	else if($cfg_isreurl=='Y')
		$gourl = 'products_detail-'.$row['classid'].'-'.$row['id'].'-1.html';
	else
		$gourl = $row['linkurl'];

	//获取缩略图地址
	if($row['picurl']!='')
		$picurl = $row['picurl'];
	else
		$picurl = 'images/nopic.gif';
?>
	<li><a href="<?php echo $gourl; ?>"><span><img src="<?php echo $picurl; ?>" /></span><?php echo $row['title']; ?></a></li>
<?php
	}
?>
<!-- 内容结束 -->				
<?php }?>
<!-- 底部 -->
<?php require_once('_foot.php'); ?>
</body>
</html>