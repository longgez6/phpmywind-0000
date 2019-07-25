<script type="text/javascript" src="scripts/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="scripts/jquery.jcarousellite.min.js"></script>
<SCRIPT>
function picresize(obj,MaxWidth,MaxHeight){
	obj.onload=null;
	img=new Image();
	img.src=obj.src;
	if (img.width>MaxWidth && img.height>MaxHeight){
		if (img.width/img.height>MaxWidth/MaxHeight) {
			obj.height=MaxWidth*img.height/img.width;
			obj.width=MaxWidth;
		}else {
			obj.width=MaxHeight*img.width/img.height;
			obj.height=MaxHeight;
		}
	}else if (img.width>MaxWidth) {
		obj.height=MaxWidth*img.height/img.width;
		obj.width=MaxWidth;
	}else if (img.height>MaxHeight) {
		obj.width=MaxHeight*img.width/img.height;
		obj.height=MaxHeight;
	}else{
		obj.width=img.width;
		obj.height=img.height;
	}
}
</SCRIPT>

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
<div class="MainBg">
	<div id="OriginalPic">
		<div id="aPrev" class="CursorL"></div>
		<div id="aNext" class="CursorR"></div>
		<?php
		foreach($picarr as $k)
		{
			$v = explode(',', $k);
		?>
		<p class="Hidden">
			<span class="SliderPicBorder "><img src="<?php echo $v[0]; ?>" onload="picresize(this,600,350);" alt="<?php echo $v[1]; ?>"/></span>
		</p>
		<?php
		}
		?>
		
	</div>

	<div class="ThumbPicBorder">
		<div id="btnPrev"><img src="images/img_jt_l.png" /></div>
		<div class="jCarouselLite FlLeft">
			<ul id="ThumbPic">
				<?php
				foreach($picarr as $k)
				{
					$v = explode(',', $k);
					$i==1;
					$i++;
					$i<100;
				?>
				<li rel="<?php echo "$i";?>"><img src="<?php echo $v[0]; ?>" /></li>
				<?php
				}
				?>
			</ul>
			<div class="clear"></div>
		</div>
		<div id="btnNext"><img src="images/img_jt_r.png"/></div>
		<div class="clear"></div>
	</div>


</div>
<?php
  }
  ?>
<script type="text/javascript">
	//缩略图滚动事件
	$(".jCarouselLite").jCarouselLite({
		btnNext: "#btnNext",
		btnPrev: "#btnPrev",
		scroll: 1,
		speed: 240,
		circular: false,
		visible: 6
	});
</script>

<script type="text/javascript">
	var currentImage;
	var currentIndex = -1;

	//显示大图(参数index从0开始计数)
	function showImage(index) {

		//更新当前图片页码
		$(".CounterCurrent").html(index + 1);

		//隐藏或显示向左向右鼠标手势
		var len = $('#OriginalPic img').length;
		if (index == len - 1) {
			$("#aNext").hide();
		} else {
			$("#aNext").show();
		}

		if (index == 0) {
			$("#aPrev").hide();
		} else {
			$("#aPrev").show();
		}

		//显示大图
		if (index < $('#OriginalPic img').length) {
			var indexImage = $('#OriginalPic p')[index];

			//隐藏当前的图
			if (currentImage) {
				if (currentImage != indexImage) {
					$(currentImage).css('z-index', 2);
					$(currentImage).fadeOut(0, function () {
						$(this).css({ 'display': 'none', 'z-index': 1 })
					});
				}
			}

			//显示用户选择的图
			$(indexImage).show().css({ 'opacity': 0.4 });
			$(indexImage).animate({ opacity: 1 }, { duration: 200 });

			//更新变量
			currentImage = indexImage;
			currentIndex = index;

			//移除并添加高亮
			$('#ThumbPic img').removeClass('active');
			$($('#ThumbPic img')[index]).addClass('active');

			//设置向左向右鼠标手势区域的高度
			//var tempHeight = $($('#OriginalPic img')[index]).height();
			//$('#aPrev').height(tempHeight);
			//$('#aNext').height(tempHeight);
		}
	}

	//下一张
	function ShowNext() {
		var len = $('#OriginalPic img').length;
		var next = currentIndex < (len - 1) ? currentIndex + 1 : 0;
		showImage(next);
	}

	//上一张
	function ShowPrep() {
		var len = $('#OriginalPic img').length;
		var next = currentIndex == 0 ? (len - 1) : currentIndex - 1;
		showImage(next);
	}

	//下一张事件
	$("#aNext").click(function () {
		ShowNext();
		if ($(".active").position().left >= 144 * 6) {
			$("#btnNext").click();
		}
	});

	//上一张事件
	$("#aPrev").click(function () {
		ShowPrep();
		if ($(".active").position().left <= 144 * 6) {
			$("#btnPrev").click();
		}
	});

	//初始化事件
	$(".OriginalPicBorder").ready(function () {
		ShowNext();

		//绑定缩略图点击事件
		$('#ThumbPic li').bind('click', function (e) {
			var count = $(this).attr('rel');
			showImage(parseInt(count) - 1);
		});
	});
</script>