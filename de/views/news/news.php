<!DOCTYPE html>
<html lang="gbk">
<head>
<meta charset="utf-8">

<title>新闻动态</title>
<meta name="description" content="">

<?php $this->load->view('include/metadata'); ?>
</head>

<body id="page-news">
<?php $this->load->view('include/header'); ?>
<div class="container">
	<div class="main-wrapper">
		
		<div class="article" style="margin-top:30px;">
			<h1><?php echo $article->title; ?> <span style="color:#666; "><?php echo $article->ftitle; ?></span></h1>
		<?php echo $article->newstext; ?>
		</div>
	</div>
	<div class="side-wrapper">
		<?php $this->load->view('include/_side'); ?>
	</div>
</div>


<?php $this->load->view('include/footer'); ?>
</body>
</html>