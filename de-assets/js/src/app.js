/* global $, siteUrl*/

$.alert = function(data) { 
	alert(data); 
};

function _uGC(l,n,s){
	if(!l || l ==='' || !n || n ==='' || !s || s===''){
		return '-';
	} 
	var i,i2,i3,c='-';
	i=l.indexOf(n);
	i3=n.indexOf('=')+1;
	if(i > -1){
		i2 = l.indexOf(s,i); if(i2 < 0) { i2 = l.length; }
		c = l.substring((i+i3), i2);
	}
	return c;
}

function isMobile(mobile)
{
	
	var format = /^1[3|4|5|8][0-9]\d{8}$/;	
	if (!mobile.trim().match(format))
	{
		return false; 
	}
	return true;
}

function setGaHidden(f){
	var z = _uGC(document.cookie, 'utmz=',';');
	var utmcsr = _uGC(z, 'utmcsr=', '|');
	var utmcmd = _uGC(z, 'utmcmd=', '|');
	var utmctr = _uGC(z, 'utmctr=', '|');
	var utmcct = _uGC(z, 'utmcct=', '|');
	var utmccn = _uGC(z, 'utmccn=', '|');

	f.web_source.value = utmcsr==='-' ? '': utmcsr;
	f.web_medium.value = utmcmd==='-' ? '': utmcmd;
	f.web_term.value =  utmctr==='-' ? '': utmctr;
	f.web_content.value = utmcct==='-' ? '': utmcct;
	f.web_campaign.value = utmccn==='-' ? '': utmccn;
	
	var gclid = _uGC(z, 'utmgclid=', '|');
	if(gclid && gclid !== '-'){
		f.web_source.value = 'google';
		f.web_medium.value = 'cpc';
		f.web_term.value = '';
		f.web_campaign.value = '';
	}
	return true;
}
/*
$(function(){
	$().Sonline({
		Position:'right',//left或right
		Top:200,//顶部距离，默认200px
		Width:165,//顶部距离，默认200px
		Style:1,//图标的显示风格共6种风格，默认显示第一种：1
		Effect:true, //滚动或者固定两种方式，布尔值：true或false
		DefaultsOpen:true, //默认展开：true,默认收缩：false
		Tel:'400-608-9787',//其它信息图片等
		Qqlist:'394785326|日本大学,2251201357|日本研究生,2251201357|日本硕士,2295469654|短期留学,2295469654|签证服务' //多个QQ用','隔开，QQ和客服名用'|'隔开
	});
});

*/


$(function(){

	$('#form_app_fast').submit( function () {
		if($('#realname').val() === ''){
			alert('请输入有效的姓名');
			$('#realname').focus();
			return false; 
		}

		if (!isMobile($('#mobile').val())){
			alert('请输入有效的手机号');
			$('#mobile').focus();
			return false; 
		}

		setGaHidden(document.app_form);
		
		return true;
	});
});



