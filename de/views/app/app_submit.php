<!DOCTYPE html>
<html lang="gbk">
<head>
<meta charset="utf-8">

<title>联系我们</title>
<meta name="description" content="">

<?php $this->load->view('include/metadata'); ?>
<link href="<?php echo assets_url('css/contact.css'); ?>" rel="stylesheet" type="text/css" />
</head>

<body id="page-contact">
<?php $this->load->view('include/header'); ?>
<div class="container">
	<div class="main-wrapper">
		
		<div class="article" style="margin-top:30px; margin-bottom:80px;">
		
			<p style="font-size:20px; padding:50px 0;">恭喜您，成功提交需求，也可以通过以下方式联系我们，谢谢</p>



			<ul  class="contact-list">
				<li><h4>上海</h4><div class="txt">电话：400-882-0598  021-64485268<br>地址：上海市徐汇区华山路2018号汇银广场北楼8楼</div></li>
				<li><h4>南京</h4><div class="txt">电话：025-83721398  83721378<br>地址：南京市鼓楼区中山路99号603室</div></li>
				<li><h4>无锡</h4><div class="txt">电话：0510-82738811  82736655<br>地址：无锡市中山路531号红豆国际21楼</div></li>
				<li><h4>苏州</h4><div class="txt">电话：0512-69330800  69330900<br>地址：苏州市干将东路889号东锦商城6楼</div></li>
				<li><h4>南通</h4><div class="txt">电话：0513-85107088  85157088<br>地址：南通市人民中路20号南通大厦A座7楼</div></li>
			</ul>

		</div>
	</div>
	<div class="side-wrapper">
		<?php $this->load->view('include/_side'); ?>
	</div>
</div>


<?php $this->load->view('include/footer'); ?>
</body>
</html>