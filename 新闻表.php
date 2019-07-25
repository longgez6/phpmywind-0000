<?php require_once(dirname(__FILE__).'/include/config.inc.php'); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<?php echo GetHeader(1,$cid); ?>
<link href="css/f_w.css" rel="stylesheet" type="text/css" />
<script src="scripts/top.js" type="text/javascript"></script>
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
<!-- 新闻列表 -->
 <?php
$dopage->GetPage("SELECT * FROM `#@__infolist` WHERE (classid=$cid OR parentstr LIKE '%,$cid,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC",8);
while($row = $dosql->GetArray())
{
	if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'news_detail.php?cid='.$row['classid'].'&id='.$row['id'];
	else if($cfg_isreurl=='Y') $gourl = 'news_detail-'.$row['classid'].'-'.$row['id'].'-1.html';
	else $gourl = $row['linkurl'];

	$row2 = $dosql->GetOne("SELECT `classname` FROM `#@__infoclass` WHERE `id`=".$row['classid']);
	if($cfg_isreurl!='Y') $gourl2 = 'news.php?cid='.$row['classid'];
	else $gourl2 = 'news-'.$row['classid'].'-1.html';
?>
<a href="<?php echo $gourl; ?>">
<?php echo $row['title']; ?>
<?php echo ReStrLen(strip_tags($row['content']),100); ?>
<?php echo GetDateMk($row['posttime']); ?>
<?php
}
?>
<!-- 分页 -->
<div class="page"><?php echo $dopage->GetList(); ?></div>
<!-- 底部 -->
<?php require_once('_foot.php'); ?>
</body>
</html>