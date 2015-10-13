

<?php if (defined('ENVIRONMENT') AND ENVIRONMENT !='development') { ?>
<script src="<?php echo assets_url('js/gah.min.js');?>" type="text/javascript"></script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-10012376-1']);
  _gaq.push(['_setDomainName', '.onlyjp.cn']);
  _gaq.push(['_addOrganic', 'soso', 'w']);
_gaq.push(['_addOrganic', 'sogou', 'query']);
_gaq.push(['_addOrganic', 'youdao', 'q']);
_gaq.push(['_addOrganic', 'baidu', 'word']);
_gaq.push(['_addOrganic', 'baidu', 'q1']);
_gaq.push(['_addOrganic', 'ucweb', 'keyword']);
_gaq.push(['_addOrganic', 'ucweb', 'word']);
_gaq.push(['_addOrganic', '114so', 'kw']);
  _gaq.push(['_setAllowHash', false]);
  gah.utmz(_gaq);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?445448cfb89afd8e924daec8a53ddd16";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<?php } ?>
<div class="container" id="header">
  <div class="logo-wrapper">
    <a href="<?php echo site_url(); ?>"><img src="<?php echo assets_url('images/global/onlyde-logo.png'); ?>"></a>
  </div>
<div style="position: absolute; top:64px; left:345px;"><a href="http://nj.onlyjp.cn">日语培训</a></div>
  <div class="youhui-wrapper">
     <a href="<?php echo site_url('coupon'); ?>"><img src="<?php echo assets_url('images/global/btn-sms.png'); ?>"></a>
  </div>

  <div class="contact-wrapper">
    <img src="<?php echo assets_url('images/global/btn-tel.png'); ?>"><br>
    <a href="http://wpa.qq.com/msgrd?v=3&uin=335251518&site=qq&menu=yes" target="_blank"><img src="<?php echo assets_url('images/global/btn-qq.png'); ?>"></a>
  </div>

</div>


<div class="container nav-primary-wrapper">
    <ul class="nav-primary">
      <li><a href="<?php echo site_url(); ?>" class="nav-home">首页</a></li>
      <li><a href="<?php echo site_url('courses'); ?>" class="nav-courses">德语课程</a></li>
      <li><a href="<?php echo site_url('teachers'); ?>" class="nav-teachers">教师风采</a></li>
      <li><a href="<?php echo site_url('abroad'); ?>" class="nav-abroad">德国留学</a></li>
      <li><a href="<?php echo site_url('test'); ?>" class="nav-test">德语考试</a></li>
      <li><a href="<?php echo site_url('contact'); ?>" class="nav-contact">校区地址</a></li>
    </ul>
</div>




