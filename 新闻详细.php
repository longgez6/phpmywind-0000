<?php require_once(dirname(__FILE__).'/include/config.inc.php'); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<?php echo GetHeader(1,$cid,$id); ?>
<link href="css/f_w.css" rel="stylesheet" type="text/css" />
<SCRIPT language="JavaScript" src="scripts/jquery2.js"></SCRIPT>
</head>
<body>
<!-- 头部 -->
<?php require_once('_top.php'); ?>
<!-- 顶部幻灯片 -->
<?php require_once('_n_banner.php'); ?>
<!-- 左侧 -->
<?php require_once('_left.php'); ?>
<!-- 为前位置 -->
<h2><?php echo GetCatName($cid); ?></h2>
<!-- 当前坐标 -->
<?php echo GetPosStr($cid); ?>
<!-- 点击量 -->
<?php
	//检测文档正确性
	$row = $dosql->GetOne("SELECT * FROM `#@__infolist` WHERE id=$id");
	if(is_array($row))
	{
		//增加一次点击量
		$dosql->ExecNoneQuery("UPDATE `#@__infolist` SET hits=hits+1 WHERE id=$id");
?>
标题：<?php echo $row['title']; ?></div>
添加时间：<?php echo GetDateMk($row['posttime']); ?>
阅读次数:<?php echo $row['hits']; ?></div>
内容：<?php echo $row['content']; ?></div>
<!-- 下一篇 -->
<?php
//获取上一篇信息
$r = $dosql->GetOne("SELECT * FROM `#@__infolist` WHERE classid=".$row['classid']." AND orderid<".$row['orderid']." AND delstate='' AND checkinfo=true ORDER BY orderid DESC");
if($r < 1)
{
	echo '<li>上一篇：已经没有了</li>';
}
else
{
	if($cfg_isreurl != 'Y')
		$gourl = 'news_detail.php?cid='.$r['classid'].'&id='.$r['id'];
	else
		$gourl = 'news_detail-'.$r['classid'].'-'.$r['id'].'-1.html';

	echo '<li>上一篇：<a href="'.$gourl.'">'.$r['title'].'</a></li>';
}

//获取下一篇信息
$r = $dosql->GetOne("SELECT * FROM `#@__infolist` WHERE classid=".$row['classid']." AND orderid>".$row['orderid']." AND delstate='' AND checkinfo=true ORDER BY orderid ASC");
if($r < 1)
{
	echo '<li>下一篇：已经没有了</li>';
}
else
{
	if($cfg_isreurl != 'Y')
		$gourl = 'news_detail.php?cid='.$r['classid'].'&id='.$r['id'];
	else
		$gourl = 'news_detail-'.$r['classid'].'-'.$r['id'].'-1.html';

	echo '<li>下一篇：<a href="'.$gourl.'">'.$r['title'].'</a></li>';
}
?>
<!-- 内容结束 -->
<?php
	}
?>
<!-- 底部 -->
<?php require_once('_foot.php'); ?>
</body>
</html>