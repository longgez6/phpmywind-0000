<?php require_once(dirname(__FILE__).'/include/config.inc.php'); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<?php echo GetHeader(1,$cid,$id); ?>
<link href="css/f_w.css" rel="stylesheet" type="text/css" />
<link href="css/base.css" rel="stylesheet" type="text/css" />
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link href="font/css/font-awesome.min.css" rel="stylesheet">
<a id="returnTop" href="javascript:;">回到顶部</a> 
<SCRIPT language="JavaScript" src="scripts/jquery2.js"></SCRIPT>
<script src="scripts/top.js" type="text/javascript"></script>
<!--[if lt IE 9]> 
<script src="http://cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
<![endif]-->
<!--[if lt IE 10]>
<script type="text/javascript" src="PIE.js"></script>
<![endif]-->
<script language="javascript">
$(function() {
    if (window.PIE) {
        $('.rounded').each(function() {
            PIE.attach(this);
        });
    }
});
</script>

</head>
<body>
<?php require_once('_top.php'); ?>
<?php require_once('_n_banner.php'); ?>

<section>
	<div class="main">
<?php require_once('_left.php'); ?>
<?php

			//检测文档正确性
			$r = $dosql->GetOne("SELECT * FROM `#@__infoimg` WHERE id=$id");
			if(@$r)
			{
			//增加一次点击量
			$dosql->ExecNoneQuery("UPDATE `#@__infoimg` SET hits=hits+1 WHERE id=$id");
			$row = $dosql->GetOne("SELECT * FROM `#@__infoimg` WHERE id=$id");
?>
        <div class="fr w750 n-con-border3">

        	<div class="breadCrumb">
                <h2><?php echo GetCatName($cid); ?> </h2>
                <h3><a href="javascript:history.go(-1);">&gt;&gt; 返回</a></h3>
                <span>您的当前位置：<?php echo GetPosStr($cid); ?></span>
            </div>
            <div class="title"><?php echo $row['title']; ?></div>
            <div class="time">添加时间：<?php echo GetDateTime($row['posttime']); ?> &nbsp;&nbsp;&nbsp;阅读次数:<?php echo $row['hits']; ?>次</div>
          
            <!-- 组图区域开始-->
            <?php require_once('_imgshow.php'); ?>
            <!-- 组图区域结束 -->
			
			<div class="content"><?php echo $row['content']; ?></div>
            <ul class="fy">
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
						$gourl = 'pic_detail.php?cid='.$r['classid'].'&id='.$r['id'];
					else
						$gourl = 'pic_detail-'.$r['classid'].'-'.$r['id'].'-1.html';

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
						$gourl = 'pic_detail.php?cid='.$r['classid'].'&id='.$r['id'];
					else
						$gourl = 'pic_detail-'.$r['classid'].'-'.$r['id'].'-1.html';

					echo '<li>下一篇：<a href="'.$gourl.'">'.$r['title'].'</a></li>';
				}
				?>
            </ul>
            
        </div>
<?php
	}
?>
    </div>
</section>
<?php require_once('_foot.php'); ?>
</body>
</html>