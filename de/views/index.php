<!DOCTYPE html>
<html lang="gbk">
<head>
<meta charset="utf-8">

<title>昂立德语培训</title>

<?php $this->load->view('include/metadata'); ?>
<link href="<?php echo assets_url('css/home.css'); ?>" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="<?php echo assets_url('js/plugins/theatre/theatre.css'); ?>">
<style type="text/css">
.tab-wrapper .hd {
	background: url(<?php echo assets_url('images/home/tab-menu-courses.png'); ?>) no-repeat;
	height: 83px;
}
.tab-wrapper .hd ul li{ float:left; width: 255px; cursor:pointer; padding-top: 18px; height: 65px;  }

</style>
<script type="text/javascript" src="<?php echo assets_url('js/plugins/theatre/jquery.theatre.min.js'); ?>"></script>

<script type="text/javascript">
	  $(window).load(function() { // Run when everything is loaded (especially images)
	     $('#photo-list').theatre({ 
		    'effect': '3d',
	        'selector': 'img' 
	     });
	  });
</script>
</head>

<body>
<?php $this->load->view('include/header'); ?>

<div class="container slogon-pic">
	<a href="<?php echo site_url('courses'); ?>"><img src="<?php echo assets_url('images/home/slogon-001.jpg'); ?>"></a>
</div>
<div class="container slogon-pic">
	<a href="<?php echo site_url('courses'); ?>"><img src="<?php echo assets_url('images/home/slogon-002.jpg'); ?>"></a>
</div>
<div class="container slogon-pic">
	<a href="<?php echo site_url('abroad'); ?>"><img src="<?php echo assets_url('images/home/slogon-003.jpg'); ?>"></a>
</div>
<div class="container tab-wrapper">
	<div class="tab-menu hd">
		<ul><li></li><li></li><li></li></ul>
		
	</div>
	<div class="tab-content bd">
		<ul><li>
		<img src="<?php echo assets_url('images/home/tab-courses-1.png'); ?>" class="online-chat">
		</li></ul>
		<ul><li>
		<img src="<?php echo assets_url('images/home/tab-courses-2.png'); ?>" class="online-chat">
		</li></ul>
		<ul><li>
		<img src="<?php echo assets_url('images/home/tab-courses-3.png'); ?>" class="online-chat">
		</li></ul>
	</div>
</div>
<script type="text/javascript">

$(".tab-wrapper").find('.hd li').on("mouseover", function(){
	$(".tab-wrapper").find('.hd').css('background-image','url(<?php echo assets_url('images/home/tab-menu-courses-'); ?>'+($(this).index()+1)+".png)");

	console.log($(this).index());
});
jQuery(".tab-wrapper").slide({delayTime:0});
</script>
<div class="container photo-wrapper">
	<div id="photo-list" style="width: 832px; margin: auto; visibility: hidden /* trick to hide loading images before Theatre kicks in */;">
      
        <img src="http://nj.onlyjp.cn/2015-assets/images/branch/nanjing-001.jpg" style="height: 320px; width: 434px;"/>
      
     
        <img src="http://nj.onlyjp.cn/2015-assets/images/branch/nanjing-002.jpg" style="height: 320px; width: 434px;"/>
  
        <img src="http://nj.onlyjp.cn/2015-assets/images/branch/nanjing-003.jpg" style="height: 320px; width: 434px;"/>
  
        <img src="http://nj.onlyjp.cn/2015-assets/images/branch/nanjing-004.jpg" style="height: 320px; width: 434px;"/>
 
        <img src="http://nj.onlyjp.cn/2015-assets/images/branch/nanjing-005.jpg" style="height: 320px; width: 434px;"/>
   
        <img src="http://nj.onlyjp.cn/2015-assets/images/branch/nanjing-006.jpg" style="height: 236px; width: 320px;"/>
     
    </div>

</div>

<?php $this->load->view('include/footer'); ?>
</body>
</html>