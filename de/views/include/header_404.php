

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
    <a href="<?php echo site_url(); ?>"><img src="<?php echo assets_url('images/global/onlyjp-logo.png'); ?>"></a>
  </div>
  <div class="navbar-wrapper">
    <ul class="navbar">
      <li><a href="http://www.onlyjp.cn/auth/auth">登录</a></li>
      <li><a href="http://www.onlyjp.cn/auth/auth/only">注册</a></li>
      <li><a href="<?php echo site_url('branch'); ?>">联系我们</a></li>
      <li><a href="http://m.onlyjp.cn">手机版</a></li>
    </ul>
    <div class="coupon">
      <a href="<?php echo site_url('coupon'); ?>">50元短信优惠券 <i class="iconfont icon-shou"></i></a>
    </div>
  </div>
</div>


<div class="container-fluid nav-city-wrapper">
  <div class="container">
    <ul class="nav-city">
      <?php foreach($this->local_list as $list) { ?>
         <li<?php if ($list['code'] == $this->local['code']) { ?> class="on"<?php } ?>><a href="http://<?php echo $list['domain']?>/" data-code="<?php echo $list['code']?>"><?php echo $list['city']; ?></a></li>
      <?php }  ?> 
    </ul>
    <ul class="navbar">
      <li><a href="<?php echo site_url('branch'); ?>"><i class="iconfont icon-5xing"></i> 五星校区</a></li>
      <li><a href="<?php echo site_url('teacher'); ?>"><i class="iconfont icon-ren"></i> 权威师资</a></li>
      <li><a href="<?php echo site_url('honor'); ?>"><i class="iconfont icon-rongyu"></i> 历年荣誉</a></li>
    </ul>
  </div>
</div>

<div class="container nav-primary-wrapper">
    <ul class="nav-primary">
      <li><a href="<?php echo site_url(); ?>">首页</a></li>
      <li><a href="<?php echo site_url('courses'); ?>">日语课程</a></li>
      <li><a href="http://liuxue.onlyjp.cn">日本留学</a></li>
      <li><a href="http://www.onlyjp.cn/enterprise">企业团培</a></li>
      <li><a href="<?php echo site_url('cover'); ?>">新闻活动</a></li>
      <li><a href="<?php echo site_url('jlpt'); ?>">考试中心</a></li>
      <li><a href="http://www.onlyjp.cn/home">日语学园</a></li>
    </ul>
</div>




