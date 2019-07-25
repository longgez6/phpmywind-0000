<?php require_once(dirname(__FILE__).'/include/config.inc.php'); ?>
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
<!-- 为前位置 -->
<h2><?php echo GetCatName($cid); ?></h2>
<!-- 当前坐标 -->
<?php echo GetPosStr($cid); ?>
<!-- 内容 -->
<div class="content"><?php echo Info($cid); ?><?php echo InfoPic($cid); ?></div>
<!-- 底部 -->
<?php require_once('_foot.php'); ?>
</body>
</html>