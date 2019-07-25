<?php
require_once(dirname(__FILE__).'/include/config.inc.php');
$cid = empty($cid) ? 18 : intval($cid);
$fenlei =  $_GET["fenlei"];
$diqu = $_GET["diqu"];
$leixing = $_GET["leixing"];
$nianling = $_GET["nianling"];
$jiage = $_GET["jiage"];
?>
<li>
<?php
echo '<a style="color:#FFF" href="/products.php?diqu='.$diqu.'&leixing='.$leixing.'&nianling='.$nianling.'&jiage='.$jiage.'"';if($fenlei != 1&&2&&3){echo 'class="on"';} echo '>全部</a>&nbsp;';
echo '<a style="color:#FFF" href="/products.php?fenlei=1&diqu='.$diqu.'&leixing='.$leixing.'&nianling='.$nianling.'&jiage='.$jiage.'"';if($fenlei == 1){echo 'class="on"';} echo '>男</a>&nbsp;';
echo '<a style="color:#FFF" href="/products.php?fenlei=2&diqu='.$diqu.'&leixing='.$leixing.'&nianling='.$nianling.'&jiage='.$jiage.'"';if($fenlei == 2){echo 'class="on"';} echo '>女</a>&nbsp;';
echo '<a style="color:#FFF" href="/products.php?fenlei=3&diqu='.$diqu.'&leixing='.$leixing.'&nianling='.$nianling.'&jiage='.$jiage.'"';if($fenlei == 3){echo 'class="on"';} echo '>组合</a>&nbsp;';
?>
</li>
<li>
<?php 
	echo '<a style="color:#FFF" href="/products.php?fenlei='.$fenlei.'&leixing='.$leixing.'&nianling='.$nianling.'&jiage='.$jiage.'">全部</a>&nbsp;';
	echo '<a style="color:#FFF" href="/products.php?fenlei='.$fenlei.'&diqu=1&leixing='.$leixing.'&nianling='.$nianling.'&jiage='.$jiage.'">大陆</a>&nbsp;';
	echo '<a style="color:#FFF" href="/products.php?fenlei='.$fenlei.'&diqu=2&leixing='.$leixing.'&nianling='.$nianling.'&jiage='.$jiage.'">香港</a>&nbsp;';
	echo '<a style="color:#FFF" href="/products.php?fenlei='.$fenlei.'&diqu=3&leixing='.$leixing.'&nianling='.$nianling.'&jiage='.$jiage.'">台湾</a>&nbsp;';
	echo '<a style="color:#FFF" href="/products.php?fenlei='.$fenlei.'&diqu=4&leixing='.$leixing.'&nianling='.$nianling.'&jiage='.$jiage.'">韩国</a>&nbsp;';
	echo '<a style="color:#FFF" href="/products.php?fenlei='.$fenlei.'&diqu=5&leixing='.$leixing.'&nianling='.$nianling.'&jiage='.$jiage.'">新马泰</a>&nbsp;';
?>
</li>
<li>
	<?php 
	echo '<a style="color:#FFF" href="/products.php?fenlei='.$fenlei.'&diqu='.$diqu.'&nianling='.$nianling.'&jiage='.$jiage.'">全部</a>&nbsp;';
	echo '<a style="color:#FFF" href="/products.php?fenlei='.$fenlei.'&diqu='.$diqu.'&leixing=1&nianling='.$nianling.'&jiage='.$jiage.'">歌手</a>&nbsp;';
	echo '<a style="color:#FFF" href="/products.php?fenlei='.$fenlei.'&diqu='.$diqu.'&leixing=2&nianling='.$nianling.'&jiage='.$jiage.'">演员</a>&nbsp;';
	echo '<a style="color:#FFF" href="/products.php?fenlei='.$fenlei.'&diqu='.$diqu.'&leixing=3&nianling='.$nianling.'&jiage='.$jiage.'">模特</a>&nbsp;';
	echo '<a style="color:#FFF" href="/products.php?fenlei='.$fenlei.'&diqu='.$diqu.'&leixing=4&nianling='.$nianling.'&jiage='.$jiage.'">主持</a>&nbsp;';
	echo '<a style="color:#FFF" href="/products.php?fenlei='.$fenlei.'&diqu='.$diqu.'&leixing=5&nianling='.$nianling.'&jiage='.$jiage.'">体育</a>&nbsp;';
	echo '<a style="color:#FFF" href="/products.php?fenlei='.$fenlei.'&diqu='.$diqu.'&leixing=2&nianling='.$nianling.'&jiage='.$jiage.'">曲艺</a>&nbsp;';
?>
</li>
<li>
	<?php 
	echo '<a style="color:#FFF" href="/products.php?fenlei='.$fenlei.'&diqu='.$diqu.'&leixing='.$leixing.'&jiage='.$jiage.'">全部</a>&nbsp;';
	echo '<a style="color:#FFF" href="/products.php?fenlei='.$fenlei.'&diqu='.$diqu.'&leixing='.$leixing.'&nianling=1&jiage='.$jiage.'">00后</a>&nbsp;';
	echo '<a style="color:#FFF" href="/products.php?fenlei='.$fenlei.'&diqu='.$diqu.'&leixing='.$leixing.'&nianling=2&jiage='.$jiage.'">90后</a>&nbsp;';
	echo '<a style="color:#FFF" href="/products.php?fenlei='.$fenlei.'&diqu='.$diqu.'&leixing='.$leixing.'&nianling=3&jiage='.$jiage.'">80后</a>&nbsp;';
	echo '<a style="color:#FFF" href="/products.php?fenlei='.$fenlei.'&diqu='.$diqu.'&leixing='.$leixing.'&nianling=4&jiage='.$jiage.'">70后</a>&nbsp;';
	echo '<a style="color:#FFF" href="/products.php?fenlei='.$fenlei.'&diqu='.$diqu.'&leixing='.$leixing.'&nianling=5&jiage='.$jiage.'">60后</a>&nbsp;';
	echo '<a style="color:#FFF" href="/products.php?fenlei='.$fenlei.'&diqu='.$diqu.'&leixing='.$leixing.'&nianling=6&jiage='.$jiage.'">50后</a>&nbsp;';
	echo '<a style="color:#FFF" href="/products.php?fenlei='.$fenlei.'&diqu='.$diqu.'&leixing='.$leixing.'&nianling=7&jiage='.$jiage.'">40后</a>&nbsp;';
?>
</li>
<li>
	<?php 
	echo '<a style="color:#FFF" href="/products.php?fenlei='.$fenlei.'&diqu='.$diqu.'&leixing='.$leixing.'&nianling='.$nianling.'">全部</a>&nbsp;';
	echo '<a style="color:#FFF" href="/products.php?fenlei='.$fenlei.'&diqu='.$diqu.'&leixing='.$leixing.'&nianling='.$nianling.'&jiage=1">A+类明星</a>&nbsp;';
	echo '<a style="color:#FFF" href="/products.php?fenlei='.$fenlei.'&diqu='.$diqu.'&leixing='.$leixing.'&nianling='.$nianling.'&jiage=2">A类明星</a>&nbsp;';
	echo '<a style="color:#FFF" href="/products.php?fenlei='.$fenlei.'&diqu='.$diqu.'&leixing='.$leixing.'&nianling='.$nianling.'&jiage=3">B类明星</a>&nbsp;';
	echo '<a style="color:#FFF" href="/products.php?fenlei='.$fenlei.'&diqu='.$diqu.'&leixing='.$leixing.'&nianling='.$nianling.'&jiage=4">C类明星</a>&nbsp;';
	echo '<a style="color:#FFF" href="/products.php?fenlei='.$fenlei.'&diqu='.$diqu.'&leixing='.$leixing.'&nianling='.$nianling.'&jiage=5">D类明星</a>&nbsp;';
	echo '<a style="color:#FFF" href="/products.php?fenlei='.$fenlei.'&diqu='.$diqu.'&leixing='.$leixing.'&nianling='.$nianling.'&jiage=6">X类待定</a>&nbsp;';
?>
</li>

<ul class="cp_list clearfix">
    	 <?php
    	 $where_xx = "classid=".$cid;
    	 if($fenlei){
    	 	$where_xx = $where_xx." && fenlei LIKE '%".$fenlei."%'";
    	 }
    	 if($diqu){
			$where_xx = $where_xx." && diqu LIKE '%".$diqu."%'";
		 }
		 if($leixing){
		 	$where_xx = $where_xx." && leixing LIKE '%".$leixing."%'";
		 }
		 if($nianling){
		 	$where_xx = $where_xx." && nianling LIKE '%".$nianling."%'";
		 }
		 if($jiage){
		 	$where_xx = $where_xx." && jiage LIKE '%".$jiage."%'";
		 }
			if(!empty($keyword))
			{
				$keyword = htmlspecialchars($keyword);
				
				$sql = "SELECT * FROM `#@__infoimg` WHERE ($where_xx) AND title LIKE '%$keyword%' AND delstate='' AND checkinfo=true ORDER BY orderid DESC";
			}
			else
			{
				$sql = "SELECT * FROM `#@__infoimg` WHERE ($where_xx) AND delstate='' AND checkinfo=true ORDER BY orderid DESC";
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
                <li class="floatl lb_li" ><a href="<?php echo $gourl; ?>"><img src="<?php echo $picurl; ?>" width="222" height="170"  /><em><?php echo $row['title']; ?></em></a> </li>
		<?php
		}
		?>
</ul>