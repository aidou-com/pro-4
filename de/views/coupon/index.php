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
		<div class="title"><h3>50元短信优惠券</h3></div>
		<div class="form-wrapper">
			<div class="sms">
			</div>
			<h4>请输入有效的信息，马上免费领取优惠券</h4>
			<form name="coupon_sms" method="post" action="<?php echo site_url('coupon'); ?>" id="theform" onsubmit="return submit_form(this);">
			<input type="hidden" name="web_source" value="" />
			<input type="hidden" name="web_medium" value="" />
			<input type="hidden" name="web_term" value="" />
			<input type="hidden" name="web_content" value="" />
			<input type="hidden" name="web_campaign" value="" />

			<div class="form-group">
			    <label for="mobile">手机号码</label>
			    <input type="text" class="form-control" name="mobile" id="mobile">
		  	</div>
		  	<div class="form-group">
			    <label for="cnname">您的姓名</label>
			    <input type="text" class="form-control" name="cnname" id="cnname">
		  	</div>
		  	<input type="hidden" name="base" value="100" />
		  	<input type="hidden" name="course" value="德语" />
		  	<div class="form-group">
			    <label for="area">报读校区</label>
			    <select name="area" id="area" class="bg">

			  <option value="南京">南京</option>
	
                    </select>
		  	</div>
		  	 <button type="submit" class="btn btn-primary btn-lg">马上领取</button>
		  	 </form>
		</div>
		<div class="tip-wrapper">
			<h4>使用说明</h4>
			<ul>
				<li>1.请您放心下载短信优惠券，下载完全免费</li>
				<li>2.此优惠券使用范围昂立教育南京校德语课程</li>
				<li>3.请在昂立教育前台报名时出示此优惠券</li>
				<li>4.凭优惠券报名可享受50元优惠</li>


			</ul>
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