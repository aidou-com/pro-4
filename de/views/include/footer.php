           <script type="text/javascript" charset="utf-8" src="http://gate.looyu.com/47027/127540.js"></script>
<div class="container-fluid" id="footer">
	<div class="container">
		<div class="site-info">025-83721398 &nbsp;&nbsp;| &nbsp;&nbsp;<a href="<?php echo site_url('contact'); ?>">联系方式</a> &nbsp;&nbsp;| &nbsp;&nbsp;昂立德语&nbsp;&nbsp;Copyright&nbsp;&nbsp;&copy;&nbsp;&nbsp;2003-2016 版权所有 <a href="http://www.miitbeian.gov.cn/">沪ICP备06032154号-1</a>
			<?php if (defined('ENVIRONMENT') AND ENVIRONMENT !='development') { ?>
			<script src="http://s46.cnzz.com/stat.php?id=1208332&web_id=1208332&show=pic1" language="JavaScript" charset="gb2312"  type="text/javascript"></script>
			<?php } ?>
			<?php if ($this->input->get('dev') == '2015' OR ENVIRONMENT =='development'){ ?>
			Page rendered in <strong>{elapsed_time}</strong> seconds
			<?php } ?>
		</div>		
	</div>
</div>

