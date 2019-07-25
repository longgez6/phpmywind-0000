<?php require_once(dirname(__FILE__).'/include/config.inc.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo GetHeader(); ?>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<script type="text/javascript" src="js/jquery.js"></script><!--通用-->
</head>
<body>
<!-- 头部 --><p><?php require_once('_top.php'); ?></p>
<!-- 首页幻灯片 -->
<p>
	<?php
	$dosql->Execute("SELECT * FROM `#@__weblink` WHERE classid=1 AND checkinfo=true ORDER BY id DESC");
	while($row = $dosql->GetArray())
	{
	?>
		<li style="background:url(<?php echo $row['picurl']?>) no-repeat center top"><a href="<?php echo $row['linkurl']?>"></a></li>
	<?php
	}
	?>
</p>
<!-- 单页调用 -->
<p>
<img src="<?php echo InfoPic(10); ?>" />
<?php	echo strip_tags(Info(10,50));?>..
</p>
<!-- 产品分类 -->
<p>
	<?php
		  $dosql->Execute("SELECT * FROM `#@__infoclass` WHERE parentid=2 AND checkinfo=true ORDER BY orderid ASC");
		  while($row = $dosql->GetArray())
	{
	?>
		<li><a href="products.php?cid=<?php echo $row['id']; ?>"><?php echo $row['classname']; ?></a></li>
	<?php
	}
	?>
</p>
<!-- 推荐产品 -->
<p>
	<?php $dosql->Execute("SELECT * FROM `#@__infoimg` WHERE (classid=2 or parentid=2 && flag like '%c%') AND checkinfo=true ORDER BY posttime DESC LIMIT 0,9");
	while($row = $dosql->GetArray())
	{
		//获取链接地址
		if($row['linkurl']=='' and $cfg_isreurl!='Y')
			$gourl = 'products_detail.php?cid='.$row['classid'].'&id='.$row['id'];
		else if($cfg_isreurl=='Y')
			$gourl = 'products_detail-'.$row['classid'].'-'.$row['id'].'-1.html';
		else
			$gourl = $row['linkurl'];
	?>
	<li><a href="<?php echo $gourl; ?>"><img src="<?php echo $row['picurl']; ?>" /><span><?php echo ReStrLen($row['title'],10); ?></span></a></li>
	<?php
	}
	?>
</p>
<!-- 推荐图片展示-->
<p>
	<?php $dosql->Execute("SELECT * FROM `#@__infoimg` WHERE (classid=3 or parentid=3 && flag like '%c%') AND checkinfo=true ORDER BY posttime DESC LIMIT 0,9");
	while($row = $dosql->GetArray())
	{
		//获取链接地址
		if($row['linkurl']=='' and $cfg_isreurl!='Y')
			$gourl = 'pic_detail.php?cid='.$row['classid'].'&id='.$row['id'];
		else if($cfg_isreurl=='Y')
			$gourl = 'pic_detail-'.$row['classid'].'-'.$row['id'].'-1.html';
		else
			$gourl = $row['linkurl'];
	?>
		<li><a href="<?php echo $gourl; ?>"><img src="<?php echo $row['picurl']; ?>"/><h3><span><?php echo ReStrLen($row['title'],19); ?></span></h3></a></li>
	<?php
	}
	?>
</p>
<!-- 新闻分类 -->
<p>
	<?php
		  $dosql->Execute("SELECT * FROM `#@__infoclass` WHERE parentid=2 AND checkinfo=true ORDER BY orderid ASC");
		  while($row = $dosql->GetArray())
	{
	?>
		<li><a href="news.php?cid=<?php echo $row['id']; ?>"><?php echo $row['classname']; ?></a></li>
	<?php
	}
	?>
</p>
<!-- 新闻列表 -->
<p>
	<?php $dosql->Execute("SELECT * FROM `#@__infolist` WHERE (classid=2 or parentid=2 && flag like '%c%') AND checkinfo=true ORDER BY posttime DESC LIMIT 0,9");
	while($row = $dosql->GetArray())
	{
		//获取链接地址
		if($row['linkurl']=='' and $cfg_isreurl!='Y')
			$gourl = 'news_detail.php?cid='.$row['classid'].'&id='.$row['id'];
		else if($cfg_isreurl=='Y')
			$gourl = 'news_detail-'.$row['classid'].'-'.$row['id'].'-1.html';
		else
			$gourl = $row['linkurl'];
	?>
	<li><a href="<?php echo $gourl; ?>"><?php echo ReStrLen($row['title'],10); ?></a><span><?php echo GetDateMk($row['posttime']); ?></span><img src="<?php echo $row['picurl']; ?>"/></li>
	<?php
	}
	?>
</p>
<!-- 友情链接 -->
<p>
	<?php
	$dosql->Execute("SELECT * FROM `#@__weblink` WHERE classid=2 AND checkinfo=true ORDER BY id DESC");
	while($row = $dosql->GetArray())
	{
	?>
		<a href="<?php echo $row['linkurl']?>"><span><?php echo $row['webname']?></span><img src="<?php echo $row['picurl']; ?>"/></a>
	<?php
	}
	?>
</p>

<!-- 底部 -->
<p><?php require_once('_top.php'); ?></p>
</body>
</html>