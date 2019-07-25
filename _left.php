
<?php if(GetCurUrl() == "/products.php" || GetCurUrl() == "/products_detail.php" || $cid==10){ ?>
<h2 class="l-part1"><span>产品展示</span>Products</h2>
	<?php
		  $dosql->Execute("SELECT * FROM `#@__infoclass` WHERE parentid=2 AND checkinfo=true ORDER BY orderid ASC");
		  while($row = $dosql->GetArray())
	{
	?>
		<li><a href="products.php?cid=<?php echo $row['id']; ?>" <?php if ($cid==$row['id']){?>class="on" <?php }?>><?php echo $row['classname']; ?></a></li>
	<?php
	}
	?>

<?php }else if(GetCurUrl() == "/news.php" || GetCurUrl() == "/news_detail.php"){ ?>
<h2 class="l-part1"><span>新闻中心</span>News</h2>
	<?php
	$dosql->Execute("SELECT * FROM `#@__infoclass` WHERE parentid=4 AND checkinfo=true ORDER BY orderid ASC");
	while($row = $dosql->GetArray())
	{
	?>
	<li><a href="news.php?cid=<?php echo $row['id']; ?>" <?php if ($cid==$row['id']){?>class="on" <?php }?>><?php echo $row['classname']; ?></a></li>
	<?php
	}
	?>

<?php }else{?>
<h2 class="l-part1"><span>关于我们</span>About Us</h2>
		<li><a href="about.php?cid=10" <?php if($cid ==10){?>class="on"<?php }?>>公司简介</a></li>
		<li><a href="about.php?cid=11" <?php if($cid ==11){?>class="on"<?php }?>>企业文化</a></li>
		<li><a href="pic.php?cid=12" <?php if($cid ==12){?>class="on"<?php }?>>公司风采</a></li>
<?php }?>


