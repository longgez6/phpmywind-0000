<?php
require_once(dirname(__FILE__).'/include/config.inc.php');
//初始化参数检测正确性
$cid = empty($cid) ? 2 : intval($cid);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<?php echo GetHeader(1,$cid); ?>
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
<!-- 当前位置 -->
<h2><?php echo GetCatName($cid); ?></h2>
<!-- 当前坐标 -->
<?php echo GetPosStr($cid); ?>
<!-- 产品列表 -->
<?php
	if(!empty($keyword))
	{
		$keyword = htmlspecialchars($keyword);
		$sql = "SELECT * FROM `#@__infoimg` WHERE (classid=$cid OR parentstr LIKE '%,$cid,%') AND title LIKE '%$keyword%' AND delstate='' AND checkinfo=true ORDER BY orderid DESC";
	}
	else
	{
		$sql = "SELECT * FROM `#@__infoimg` WHERE (classid=$cid OR parentstr LIKE '%,$cid,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC";
	}

	$dopage->GetPage($sql,6);
	while($row = $dosql->GetArray())
	{
		if($row['picurl'] != '') $picurl = $row['picurl'];
		else $picurl = 'images/nopic.gif';
		
		if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'products_detail.php?cid='.$row['classid'].'&id='.$row['id'];
		else if($cfg_isreurl=='Y') $gourl = 'products_detail-'.$row['classid'].'-'.$row['id'].'-1.html';
		else $gourl = $row['linkurl'];
?>
	<li><a href="<?php echo $gourl; ?>"><img src="<?php echo $picurl; ?>" /><span><?php echo $row['title']; ?></span></a></li>
<?php
	}
?>
<!-- 分页 -->
<div class="page"><?php echo $dopage->GetList(); ?></div>
<!-- 底部 -->
<?php require_once('_foot.php'); ?>
</body>
</html>