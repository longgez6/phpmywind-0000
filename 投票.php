<?php	require_once(dirname(__FILE__).'/include/config.inc.php');


//初始化参数检测正确性
$id = intval($id);


//投票内容处理
if(isset($action) and $action=='add')
{	
	if(empty($options))
	{
		ShowMsg('请选择投票项目！','vote.php?id='.$id);
		exit();
	}

	$time = time();
	$ip   = GetIP();


	$r = $dosql->GetOne("SELECT `intval` FROM `#@__vote` WHERE id=$id");
	$intval = $r['intval'];

	if(!empty($intval))
	{
		$r = $dosql->GetOne("SELECT `posttime` FROM `#@__votedata` WHERE voteid=$id AND ip='$ip' ORDER BY id DESC");
		if(!empty($r))
		{
			if($intval>($time-$r['posttime'])/60)
			{
				ShowMsg('请间隔'.$intval.'分钟后再来投票吧！','vote.php?id='.$id);
				exit();
			}
		}
	}
	else
	{
		$r = $dosql->GetOne("SELECT `id` FROM `#@__votedata` WHERE voteid=$id AND ip='$ip' ORDER BY id DESC");
		if(isset($r['id']))
		{
			ShowMsg('抱歉，您已经投过票了！每个IP只能投一次票。','vote.php?id='.$id);
			exit();
		}
	}

	
	if(is_array($options))
	{
		$options = implode(',', $options);
	}


	$sql = "INSERT INTO `#@__votedata` (voteid, optionid, userid, posttime, ip) VALUES ('$voteid', '$options', 0, '$time', '$ip')";
	if($dosql->ExecNoneQuery($sql))
	{
		ShowMsg('投票成功，感谢您的支持！','pp.php?id='.$id);
		exit();
	}
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo GetHeader(1,0,0,'投票'); ?>
<script type="text/javascript" src="/jquery.min.js"></script>
<script type="text/javascript">
function cfm_vote()
{
	if($("input[name^='option']:checked").size() == 0)
	{
		alert("请选择投票项目！");
		$("#nickname").focus();
		return false;
	}
	$("#form").submit();
}
</script>
</head>
<body>
<div class="subBody">
	<?php
	$r = $dosql->GetOne("SELECT * FROM `#@__vote` WHERE id=$id");
	if(!empty($r))
	{
	?>
	<div class="vote_area">
		<h1><?php echo $r['title']; ?></h1>
		<p><?php echo $r['content']; ?></p>
		<form name="form" id="form" method="post" action="">
			<ul>
			<?php
			if($r['isview'] == 'true')
			{
				$dosql->Execute("SELECT `optionid` FROM `#@__votedata` WHERE voteid=".$r['id']);
				$optionid_str = '';
				while($row = $dosql->GetArray())
				{
					$optionid_str .= $row['optionid'].',';
				}
			}

			$dosql->Execute("SELECT * FROM `#@__voteoption` WHERE voteid=$id");
			$i = 0;
			while($row = $dosql->GetArray())
			{
				echo '<li';
				if($i%2 == 0)
				{
					echo ' class="li_on"';
				}
				echo '>';
				if($r['isradio'] == 1)
				{
					echo '<span class="fl"><input type="radio" name="options" id="options" value="'.$row['id'].'" />';
				}
				else
				{
					echo '<span class="fl"><input type="checkbox" name="options[]" id="options[]" value="'.$row['id'].'" />';
				}
				echo '&nbsp;&nbsp;'.$row['options'].'</span>';

				if($r['isview'] == 'true')
				{
					echo '<strong class="fr" title="票数">('.substr_count($optionid_str, $row['id']).')</strong>';
				}
				echo '</li>';
				$i++;
			}
			
			unset($optionid_str);
			?>
			</ul>
			<input type="hidden" name="voteid" id="voteid" value="<?php echo $id; ?>" />
			<input type="hidden" name="action" id="action" value="add" />
			<div><a href="javascript:void(0);" onclick="cfm_vote();return false;">提　交</a> &nbsp; <a href="javascript:void(0);" onclick="window.close();return false;">关　闭</a></div>
		</form>
	</div>
	<?php
	}
	?>
</div>
</body>
</html>