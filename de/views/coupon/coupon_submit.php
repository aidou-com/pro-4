<!DOCTYPE html>
<html lang="gbk">
<head>
<meta charset="utf-8">

<title>昂立日语</title>
<meta name="keywords" content="日语,日语培训,日语学习，日语学校，昂立日语">
<meta name="description" content="日语培训学校，日语能力考,日语口译,日语培训学习到上海交大昂立日语学校。日语成就梦想,昂立引领飞翔.百年交大品质,中外知名教授联合授课,全天候上课,寓教于乐,在互动中学习到实用日语.特价优惠中">

<?php $this->load->view('include/metadata'); ?>
<link href="<?php echo assets_url('css/coupon.css'); ?>" rel="stylesheet" type="text/css" />

</head>

<body>
<?php $this->load->view('include/header.php'); ?>
<div class="container">
	<div class="coupon-wrapper">
		<h1><img src="<?php echo assets_url('images/coupon/title.jpg'); ?>" alt="昂立日语报名优惠券"></h1>
		<div class="message">
			<?php echo $msg; ?>
		</div>		
	</div>


	
</div>
<div class="container">
	<hr></hr>
</div>
<script type="text/javascript">

function submit_form(theform) {
//	if(sys_debug) return true;
//	setHidden(theform);

	if(theform.mobile.value.length != 11) {
		alert('请输入有效的手机号码');
		theform.mobile.focus();
		return false;
	}

	if(theform.cnname.value == '') {
		alert('请输入您的姓名');
		theform.cnname.focus();
		return false;
	}
	
	if(theform.area.value == '') {
		alert('请输入有效的所在区域');
		theform.area.focus();
		return false;
	}

   
   	

	return true;	
}
</script>


<?php $this->load->view('include/footer.php'); ?>
</body>
</html>