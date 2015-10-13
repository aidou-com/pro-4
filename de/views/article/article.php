<!DOCTYPE html>
<html lang="gbk">
<head>
<meta charset="utf-8">

<title><?php echo str_replace(array("\"", "\n"), "", strip_tags($article->title)); ?></title>
<meta name="description" content="<?php echo mb_strimwidth(str_replace(array("\"", "\n", "&nbsp;"), "", strip_tags($article->newstext)), 0, 250, '...'); ?>">

<?php $this->load->view('include/metadata'); ?>
<link href="<?php echo assets_url('css/branch.css'); ?>" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="<?php echo assets_url('js/plugins/theatre/theatre.css'); ?>">
<script type="text/javascript" src="<?php echo assets_url('js/plugins/theatre/jquery.theatre.min.js'); ?>"></script>

<script type="text/javascript">
	  $(window).load(function() { // Run when everything is loaded (especially images)
	     $('#photo-list').theatre({ 
		    'effect': '3d',
	        'selector': 'img' 
	     });
	  });
</script>
<style type="text/css">
#map{
	width: 220px;
	height: 220px;

} 
</style>
</head>

<body>
<?php $this->load->view('include/header'); ?>
<div class="container">
	<div class="main-wrapper">
		<div class="article">
		<h1><?php echo $article->title; ?> <span style="color:#666; "><?php echo $article->ftitle; ?></span></h1>
		<?php echo $article->newstext; ?>
		</div>
	</div>
	<div class="side-wrapper">
		<?php $this->load->view('article/_side'); ?>
	</div>
</div>


<?php $this->load->view('include/footer'); ?>
</body>
</html>