<!DOCTYPE html>
<html lang="gbk">
<head>
<meta charset="utf-8">

<title>新闻动态</title>
<meta name="description" content="">

<?php $this->load->view('include/metadata'); ?>
<script src="<?php echo assets_url('js/plugins/masonry/jquery.masonry.min.js'); ?>" type="text/javascript"></script>

<style type="text/css">
#cover .item {
  width: 240px;
  margin: 10px;
  padding:12px;
  float: left;

}
#cover{margin:0 50px; }
#cover .item{background:#F5F5F5}
#cover .item img{ padding-bottom:5px;}
#cover .cover_tit{line-height:19px; padding:5px; font-size:14px; font-weight:bold}
#cover .cover_pinglun{padding:5px;}

.breadcrumb-wrapper {
	padding: 10px 0;
}

</style>
<script type="text/javascript">
$(function(){
 var $container = $('#cover');
$container.imagesLoaded(function(){
  $container.masonry({
    itemSelector : '.item',
    columnWidth : 284

  });
});

});
</script>
</head>

<body id="page-news">
<?php $this->load->view('include/header'); ?>
<div class="container">
	<div class="main-wrapper">
		<div class="head">
			<h2><img src="<?php echo assets_url('images/news/news-title.png'); ?>"></h2>	
		</div>
		<div id="cover">
			<?php foreach($news_list as $list) { ?>
			<div class="item">
			<div class="cover_img"><a href="<?php echo site_url('news/'.$list->id); ?>"><img src="http://www.onlyjp.cn<?php echo $list->titlepic; ?>" width="240px;"></a></div>
			<div class="cover_tit"><a href="<?php echo site_url('news/'.$list->id); ?>"><?php echo $list->title; ?></a></div>
			
			
			</div>
			<?php } ?>
		</div>
	</div>
	<div class="side-wrapper">
		<?php $this->load->view('include/_side'); ?>
	</div>
</div>


<?php $this->load->view('include/footer'); ?>
</body>
</html>