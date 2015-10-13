<meta http-equiv="Cache-Control" content="no-transform " />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="alternate" type="application/vnd.wap.xhtml+xml" media="handheld" href="http://m.onlyjp.cn" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="renderer" content="webkit">
<meta name="author" content="FBF @http://weibo.com/iamfbf" />
<meta name="copyright" content="Aidou" />
<link rel="shortcut icon" href="favicon.ico">
<link rel="Bookmark" href="favicon.ico">
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="x5-page-mode" content="app" />
<meta name="x5-fullscreen" content="true" />

<link href="<?php echo assets_url('css/global.css'); ?>" rel="stylesheet" />


<script src="<?php echo assets_url('js/global.min.js'); ?>"></script>
<script type="text/javascript">
var siteUrl = "<?php echo rtrim($this->config->site_url(), '/').'/'; ?>";
var assetsUrl = "<?php echo assets_url(); ?>";
</script>
<?php if(ENVIRONMENT == 'production'){ ?>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?e6b5774b794e28b2e9786eeb38cfa044";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<?php } ?>


