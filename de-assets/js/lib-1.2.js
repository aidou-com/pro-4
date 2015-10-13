i_url =local_url;
var category={
	OBJ:$("#_JD_ALLSORT"),
	URL_Serv: base_url+"native/getDataService.php?ffffff3f&citycode="+citycode,
	URL_BrandsServ: base_url+"native/getBrandService.php?citycode="+citycode,
	FN_GetLink:function(c,d){
		var a,b;
		switch(c){
			case 1:a=d.u;b=d.n;break;
			case 2:
				a=d.split("|")[0];
				b=d.split("|")[1];
				break;
		}
		if(a==""){
			return b;
		}else{
			if(!/^http[s]?:\/\/([\w-]+\.)+[\w-]+([\w-.\/?%&=]*)?$/.test(a)){
				//a= 'http://www.onlyjp.cn/'+a;
				
				a= i_url  + a;
			}
			return'<a href="'+a+'">'+b+"</a>";
		}
	},
	FN_SetLink:function(a){
		var b="";
		return b;
	},
	DATA_Simple:{
		"1":[{l:"/courses/",n:"日语能力考"}],
		"2":[{l:"/courses/list_0_80_0_0_0.html",n:"全日制日语班"}],
		"3":[{l:"/courses/list_65_0_0_0_0.html",n:"商务日语班"}],
		"4":[{l:"http://sjtu.onlyjp.cn",n:"交大留学直通班"}],
		"5":[{l:"http://liuxue.onlyjp.cn",n:"留学签证"}],
		"6":[{l:"/courses/list_5_0_0_0_0.html",n:"口语口译"}],
		"7":[{l:"/courses/",n:"其它日语考试"}],
		"8":[{l:"/enterprise/",n:"企业培训"}],
		"9":[{l:"http://vip.onlyjp.cn",n:"日语VIP"}]
	},
	TPL_Simple:'{for item in data}		<div class="item fore${parseInt(item_index)}">			<span><h3>			{for sItem in item}{if sItem_index!=0}、{/if}<a href="${sItem.l}">${sItem.n}</a>{/for}			</h3><s></s></span>		</div>		{/for}<div class="extra"><a href="'+url+'courses/">全部课程分类</a></div>',
	FN_InitSimple:function(){
		var b,a={};
		a.data=this.DATA_Simple;
		b=this.TPL_Simple.process(a);
		$("#_JD_ALLSORT").html(b);
	},
	TPL_Items:'{for item in data}<div class="item fore${parseInt(item_index)+1}"><span><h3>${item.n}</h3><s></s></span><div class="i-mc">				<div onclick="$(this).parent().parent().removeClass(\'hover\')" class="close"></div>				<div class="subitem">					{for subitem in item.i}					<dl class="fore${parseInt(subitem_index)+1}">						<dt>${category.FN_GetLink(1,subitem)}</dt>						<dd>{for link in subitem.i}<em>${category.FN_GetLink(2,link)}</em>{/for}</dd>					</dl>					{/for}				</div>				<div class="fr" id="JD_sort_${item.t}"><div class="loading-style1"><b></b>加载中，请稍候...</div></div>			</div>		</div>		{/for}<div class="extra"><a href="/courses/">全部课程分类</a></div>',
	TPL_Brands:'${category.FN_SetLink(id)}		{if b.length!=0}		<dl class="categorys-brands">			{if id==\'k\'}				<dt>推荐信息</dt>			{else}				{if id==\'l\'}					<dt>推荐课程</dt>				{else}					<dt>推荐信息</dt>				{/if}			{/if}			<dd>				<ul>					{for item in b}					<li><a href="${item.u}" target="_blank">${item.n}</a></li>					{/for}				</ul>			</dd>		</dl>		{/if}		{if p.length!=0}		<dl class="categorys-promotions">			<dt>促销活动</dt>			<dd>				<ul>					{for item in p}					<li><a href="${item.u}" target="_blank">${item.n}</a></li>					{/for}				</ul>			</dd>		</dl>		{/if}',
	FN_GetData:function(){
		$.getJSONP(this.URL_Serv,category.getDataService);
	},
	FN_GetBrands:function(){
		$.getJSONP(this.URL_BrandsServ,category.getBrandService);
	},
	getDataService:function(b){
		var a=this.TPL_Items.process(b);
		this.OBJ.attr("load","1").html(a);
		this.FN_GetBrands();
		this.OBJ.find(".item").Jdropdown({delay:200});
	},
	getBrandService:function(a){
		var c=this,b=a.data;
		this.OBJ.attr("load","2");
		$.each(b,function(e){
						  var d=c.TPL_Brands.process(b[e]);
						  $("#JD_sort_"+b[e].id).html(d);
						  });
	},
	FN_Init:function(){
		if(!this.OBJ.length){
			return;
		}
		if(!this.OBJ.attr("load")){
			if(window.pageConfig&&window.pageConfig.pageId!=0){
				this.FN_InitSimple();
			}
			$("#categorys").Jdropdown({delay:200});
		}
		var a=this;
		this.OBJ.one("mouseover",function(){
										  var b=a.OBJ.attr("load");
										  if(!b){
											  a.FN_GetData();
										  }else{
											  if(b==1){
												  a.FN_GetBrands();
										      }else{
												 return;
											  }
										  }
									});
	}
};

(function(a){a.fn.hoverForIE6=function(c){var b=a.extend({current:"hover",delay:10},c||{});a.each(this,function(){var f=null,e=null,d=false;a(this).bind("mouseover",function(){if(d){clearTimeout(e);}else{var g=a(this);f=setTimeout(function(){g.addClass(b.current);d=true;},b.delay);}}).bind("mouseout",function(){if(d){var g=a(this);e=setTimeout(function(){g.removeClass(b.current);d=false;},b.delay);}else{clearTimeout(f);}});});};})(jQuery);

(function(a){a.fn.Jdropdown=function(c,d){if(!this.length){return;}if(typeof c=="function"){d=c;c={};}var b=a.extend({current:"hover",delay:0},c||{});a.each(this,function(){var g=null,f=null,e=false;a(this).hover(function(){if(e){clearTimeout(f);}else{var h=a(this);g=setTimeout(function(){h.addClass(b.current);e=true;if(d){d(h);}},b.delay);}},function(){if(e){var h=a(this);f=setTimeout(function(){h.removeClass(b.current);e=false;},b.delay);}else{clearTimeout(g);}});});};})(jQuery);

(function($){$.extend({_jsonp:{scripts:{},counter:1,charset:"gb2312",head:document.getElementsByTagName("head")[0],name:function(callback){var name="_jsonp_"+(new Date).getTime()+"_"+this.counter;this.counter++;var cb=function(json){eval("delete "+name);callback(json);$._jsonp.head.removeChild($._jsonp.scripts[name]);delete $._jsonp.scripts[name];};eval(name+" = cb");return name;},load:function(url,name){var script=document.createElement("script");script.type="text/javascript";script.charset=this.charset;script.src=url;this.head.appendChild(script);this.scripts[name]=script;}},getJSONP:function(url,callback){var name=$._jsonp.name(callback);var url=url.replace(/{callback};/,name);$._jsonp.load(url,name);return this;}});})(jQuery);

var TrimPath;(function(){if(TrimPath==null){TrimPath=new Object();}if(TrimPath.evalEx==null){TrimPath.evalEx=function(src){return eval(src);};}var UNDEFINED;if(Array.prototype.pop==null){Array.prototype.pop=function(){if(this.length===0){return UNDEFINED;}return this[--this.length];};}if(Array.prototype.push==null){Array.prototype.push=function(){for(var i=0;i<arguments.length;++i){this[this.length]=arguments[i];}return this.length;};}TrimPath.parseTemplate=function(tmplContent,optTmplName,optEtc){if(optEtc==null){optEtc=TrimPath.parseTemplate_etc;}var funcSrc=parse(tmplContent,optTmplName,optEtc);var func=TrimPath.evalEx(funcSrc,optTmplName,1);if(func!=null){return new optEtc.Template(optTmplName,tmplContent,funcSrc,func,optEtc);}return null;};try{String.prototype.process=function(context,optFlags){var template=TrimPath.parseTemplate(this,null);if(template!=null){return template.process(context,optFlags);}return this;};}catch(e){}TrimPath.parseTemplate_etc={};TrimPath.parseTemplate_etc.statementTag="forelse|for|if|elseif|else|var|macro";TrimPath.parseTemplate_etc.statementDef={"if":{delta:1,prefix:"if (",suffix:") {",paramMin:1},"else":{delta:0,prefix:"} else {"},elseif:{delta:0,prefix:"} else if (",suffix:") {",paramDefault:"true"},"/if":{delta:-1,prefix:"}"},"for":{delta:1,paramMin:3,prefixFunc:function(stmtParts,state,tmplName,etc){if(stmtParts[2]!="in"){throw new etc.ParseError(tmplName,state.line,"bad for loop statement: "+stmtParts.join(" "));}var iterVar=stmtParts[1];var listVar="__LIST__"+iterVar;return["var ",listVar," = ",stmtParts[3],";","var __LENGTH_STACK__;","if (typeof(__LENGTH_STACK__) == 'undefined' || !__LENGTH_STACK__.length) __LENGTH_STACK__ = new Array();","__LENGTH_STACK__[__LENGTH_STACK__.length] = 0;","if ((",listVar,") != null) { ","var ",iterVar,"_ct = 0;","for (var ",iterVar,"_index in ",listVar,") { ",iterVar,"_ct++;","if (typeof(",listVar,"[",iterVar,"_index]) == 'function') {continue;}","__LENGTH_STACK__[__LENGTH_STACK__.length - 1]++;","var ",iterVar," = ",listVar,"[",iterVar,"_index];"].join("");}},forelse:{delta:0,prefix:"} } if (__LENGTH_STACK__[__LENGTH_STACK__.length - 1] == 0) { if (",suffix:") {",paramDefault:"true"},"/for":{delta:-1,prefix:"} }; delete __LENGTH_STACK__[__LENGTH_STACK__.length - 1];"},"var":{delta:0,prefix:"var ",suffix:";"},macro:{delta:1,prefixFunc:function(stmtParts,state,tmplName,etc){var macroName=stmtParts[1].split("(")[0];return["var ",macroName," = function",stmtParts.slice(1).join(" ").substring(macroName.length),"{ var _OUT_arr = []; var _OUT = { write: function(m) { if (m) _OUT_arr.push(m); } }; "].join("");}},"/macro":{delta:-1,prefix:" return _OUT_arr.join(''); };"}};TrimPath.parseTemplate_etc.modifierDef={eat:function(v){return"";},escape:function(s){return String(s).replace(/&/g,"&").replace(/</g,"<").replace(/>/g,">");},capitalize:function(s){return String(s).toUpperCase();},"default":function(s,d){return s!=null?s:d;}};TrimPath.parseTemplate_etc.modifierDef.h=TrimPath.parseTemplate_etc.modifierDef.escape;TrimPath.parseTemplate_etc.Template=function(tmplName,tmplContent,funcSrc,func,etc){this.process=function(context,flags){if(context==null){context={};}if(context._MODIFIERS==null){context._MODIFIERS={};}if(context.defined==null){context.defined=function(str){return(context[str]!=undefined);};}for(var k in etc.modifierDef){if(context._MODIFIERS[k]==null){context._MODIFIERS[k]=etc.modifierDef[k];}}if(flags==null){flags={};}var resultArr=[];var resultOut={write:function(m){resultArr.push(m);}};try{func(resultOut,context,flags);}catch(e){if(flags.throwExceptions==true){throw e;}var result=new String(resultArr.join("")+"[ERROR: "+e.toString()+(e.message?"; "+e.message:"")+"]");result.exception=e;return result;}return resultArr.join("");};this.name=tmplName;this.source=tmplContent;this.sourceFunc=funcSrc;this.toString=function(){return"TrimPath.Template ["+tmplName+"]";};};TrimPath.parseTemplate_etc.ParseError=function(name,line,message){this.name=name;this.line=line;this.message=message;};TrimPath.parseTemplate_etc.ParseError.prototype.toString=function(){return("TrimPath template ParseError in "+this.name+": line "+this.line+", "+this.message);};var parse=function(body,tmplName,etc){body=cleanWhiteSpace(body);var funcText=["var TrimPath_Template_TEMP = function(_OUT, _CONTEXT, _FLAGS) { with (_CONTEXT) {"];var state={stack:[],line:1};var endStmtPrev=-1;while(endStmtPrev+1<body.length){var begStmt=endStmtPrev;begStmt=body.indexOf("{",begStmt+1);while(begStmt>=0){var endStmt=body.indexOf("}",begStmt+1);var stmt=body.substring(begStmt,endStmt);var blockrx=stmt.match(/^\{(cdata|minify|eval)/);if(blockrx){var blockType=blockrx[1];var blockMarkerBeg=begStmt+blockType.length+1;var blockMarkerEnd=body.indexOf("}",blockMarkerBeg);if(blockMarkerEnd>=0){var blockMarker;if(blockMarkerEnd-blockMarkerBeg<=0){blockMarker="{/"+blockType+"}";}else{blockMarker=body.substring(blockMarkerBeg+1,blockMarkerEnd);}var blockEnd=body.indexOf(blockMarker,blockMarkerEnd+1);if(blockEnd>=0){emitSectionText(body.substring(endStmtPrev+1,begStmt),funcText);var blockText=body.substring(blockMarkerEnd+1,blockEnd);if(blockType=="cdata"){emitText(blockText,funcText);}else{if(blockType=="minify"){emitText(scrubWhiteSpace(blockText),funcText);}else{if(blockType=="eval"){if(blockText!=null&&blockText.length>0){funcText.push("_OUT.write( (function() { "+blockText+" })() );");}}}}begStmt=endStmtPrev=blockEnd+blockMarker.length-1;}}}else{if(body.charAt(begStmt-1)!="$"&&body.charAt(begStmt-1)!="\\"){var offset=(body.charAt(begStmt+1)=="/"?2:1);if(body.substring(begStmt+offset,begStmt+10+offset).search(TrimPath.parseTemplate_etc.statementTag)==0){break;}}}begStmt=body.indexOf("{",begStmt+1);}if(begStmt<0){break;}var endStmt=body.indexOf("}",begStmt+1);if(endStmt<0){break;}emitSectionText(body.substring(endStmtPrev+1,begStmt),funcText);emitStatement(body.substring(begStmt,endStmt+1),state,funcText,tmplName,etc);endStmtPrev=endStmt;}emitSectionText(body.substring(endStmtPrev+1),funcText);if(state.stack.length!=0){throw new etc.ParseError(tmplName,state.line,"unclosed, unmatched statement(s): "+state.stack.join(","));}funcText.push("}}; TrimPath_Template_TEMP");return funcText.join("");};var emitStatement=function(stmtStr,state,funcText,tmplName,etc){var parts=stmtStr.slice(1,-1).split(" ");var stmt=etc.statementDef[parts[0]];if(stmt==null){emitSectionText(stmtStr,funcText);return;}if(stmt.delta<0){if(state.stack.length<=0){throw new etc.ParseError(tmplName,state.line,"close tag does not match any previous statement: "+stmtStr);}state.stack.pop();}if(stmt.delta>0){state.stack.push(stmtStr);}if(stmt.paramMin!=null&&stmt.paramMin>=parts.length){throw new etc.ParseError(tmplName,state.line,"statement needs more parameters: "+stmtStr);}if(stmt.prefixFunc!=null){funcText.push(stmt.prefixFunc(parts,state,tmplName,etc));}else{funcText.push(stmt.prefix);}if(stmt.suffix!=null){if(parts.length<=1){if(stmt.paramDefault!=null){funcText.push(stmt.paramDefault);}}else{for(var i=1;i<parts.length;i++){if(i>1){funcText.push(" ");}funcText.push(parts[i]);}}funcText.push(stmt.suffix);}};var emitSectionText=function(text,funcText){if(text.length<=0){return;}var nlPrefix=0;var nlSuffix=text.length-1;while(nlPrefix<text.length&&(text.charAt(nlPrefix)=="\n")){nlPrefix++;}while(nlSuffix>=0&&(text.charAt(nlSuffix)==" "||text.charAt(nlSuffix)=="\t")){nlSuffix--;}if(nlSuffix<nlPrefix){nlSuffix=nlPrefix;}if(nlPrefix>0){funcText.push('if (_FLAGS.keepWhitespace == true) _OUT.write("');var s=text.substring(0,nlPrefix).replace("\n","\\n");if(s.charAt(s.length-1)=="\n"){s=s.substring(0,s.length-1);}funcText.push(s);funcText.push('");');}var lines=text.substring(nlPrefix,nlSuffix+1).split("\n");for(var i=0;i<lines.length;i++){emitSectionTextLine(lines[i],funcText);if(i<lines.length-1){funcText.push('_OUT.write("\\n");\n');}}if(nlSuffix+1<text.length){funcText.push('if (_FLAGS.keepWhitespace == true) _OUT.write("');var s=text.substring(nlSuffix+1).replace("\n","\\n");if(s.charAt(s.length-1)=="\n"){s=s.substring(0,s.length-1);}funcText.push(s);funcText.push('");');}};var emitSectionTextLine=function(line,funcText){var endMarkPrev="}";var endExprPrev=-1;while(endExprPrev+endMarkPrev.length<line.length){var begMark="${",endMark="}";var begExpr=line.indexOf(begMark,endExprPrev+endMarkPrev.length);if(begExpr<0){break;}if(line.charAt(begExpr+2)=="%"){begMark="${%";endMark="%}";}var endExpr=line.indexOf(endMark,begExpr+begMark.length);if(endExpr<0){break;}emitText(line.substring(endExprPrev+endMarkPrev.length,begExpr),funcText);var exprArr=line.substring(begExpr+begMark.length,endExpr).replace(/\|\|/g,"#@@#").split("|");for(var k in exprArr){if(exprArr[k].replace){exprArr[k]=exprArr[k].replace(/#@@#/g,"||");}}funcText.push("_OUT.write(");emitExpression(exprArr,exprArr.length-1,funcText);funcText.push(");");endExprPrev=endExpr;endMarkPrev=endMark;}emitText(line.substring(endExprPrev+endMarkPrev.length),funcText);};var emitText=function(text,funcText){if(text==null||text.length<=0){return;}text=text.replace(/\\/g,"\\\\");text=text.replace(/\n/g,"\\n");text=text.replace(/"/g,'\\"');funcText.push('_OUT.write("');funcText.push(text);funcText.push('");');};var emitExpression=function(exprArr,index,funcText){var expr=exprArr[index];if(index<=0){funcText.push(expr);return;}var parts=expr.split(":");funcText.push('_MODIFIERS["');funcText.push(parts[0]);funcText.push('"](');emitExpression(exprArr,index-1,funcText);if(parts.length>1){funcText.push(",");funcText.push(parts[1]);}funcText.push(")");};var cleanWhiteSpace=function(result){result=result.replace(/\t/g,"    ");result=result.replace(/\r\n/g,"\n");result=result.replace(/\r/g,"\n");result=result.replace(/^(\s*\S*(\s+\S+)*)\s*$/,"$1");return result;};var scrubWhiteSpace=function(result){result=result.replace(/^\s+/g,"");result=result.replace(/\s+$/g,"");result=result.replace(/\s+/g," ");result=result.replace(/^(\s*\S*(\s+\S+)*)\s*$/,"$1");return result;};TrimPath.parseDOMTemplate=function(elementId,optDocument,optEtc){if(optDocument==null){optDocument=document;}var element=optDocument.getElementById(elementId);var content=element.value;if(content==null){content=element.innerHTML;}content=content.replace(/</g,"<").replace(/>/g,">");return TrimPath.parseTemplate(content,elementId,optEtc);};TrimPath.processDOMTemplate=function(elementId,context,optFlags,optDocument,optEtc){return TrimPath.parseDOMTemplate(elementId,optDocument,optEtc).process(context,optFlags);};})();(function($){$.extend({_jsonp:{scripts:{},counter:1,charset:"gb2312",head:document.getElementsByTagName("head")[0],name:function(callback){var name="_jsonp_"+(new Date).getTime()+"_"+this.counter;this.counter++;var cb=function(json){eval("delete "+name);callback(json);$._jsonp.head.removeChild($._jsonp.scripts[name]);delete $._jsonp.scripts[name];};eval(name+" = cb");return name;},load:function(url,name){var script=document.createElement("script");script.type="text/javascript";script.charset=this.charset;script.src=url;this.head.appendChild(script);this.scripts[name]=script;}},getJSONP:function(url,callback){var name=$._jsonp.name(callback);var url=url.replace(/{callback};/,name);$._jsonp.load(url,name);return this;}});})(jQuery);
category.FN_Init();

function onlyedu_extand(){
	var position = $("#onlyedu_nav_top").position();
	var w = $(".onlyedu_nav_hide").width();
	$(".onlyedu_nav_hide").css('left',position.left+700-w+'px');
//	$(".onlyedu_nav_show").css('left','-9999px');
	$(".onlyedu_nav_show").hide();
	$(".onlyedu_nav_hide").show();


	
}
function onlyedu_extand2(){
	var position = $("#onlyedu_nav_top").position();
	var w = $(".onlyedu_nav_show").width();
	$(".onlyedu_nav_show").css('left',position.left+700-w+'px');
//	$(".onlyedu_nav_hide").css('left','-9999px');
	$(".onlyedu_nav_hide").hide();
	$(".onlyedu_nav_show").show();
}

function liuxue_extand(){
	var position = $("#nav_fore3").offset();
	$(".menu_liuxue").css('left',position.left+'px');
	$(".menu_liuxue").css('top',position.top+40+'px');
	
}

$(document).ready(function(){
//	onlyedu_extand();
	
	
	$(".nav_fore3").bind("mouseenter", function(){	
		liuxue_extand();
  		$(".menu_liuxue").show();
	});
	$(".nav_fore3").bind("mouseleave", function(){	
  		$(".menu_liuxue").hide();
	});
	$(".menu_liuxue").bind("mouseenter", function(){
  		$(".menu_liuxue").show();
		setTimeout(function(){$(".nav_fore3").addClass('hover')},10);
		
	});
	$(".menu_liuxue").bind("mouseleave", function(){	
		setTimeout(function(){$(".nav_fore3").removeClass('hover')},10);
  		$(".menu_liuxue").hide();
	});

	$("#navitems li").hoverForIE6();
	$(".lnav li").hoverForIE6();

	$(".onlyedu_nav_hide").bind("mouseenter", function(){	
  		onlyedu_extand2();		
	});
	$(".onlyedu_nav_hide").bind("mouseleave", function(){	
  		f = setTimeout(onlyedu_extand,100);		
	});
	$(".onlyedu_nav_show").bind("mouseenter", function(){			
  		clearTimeout(f);
		onlyedu_extand2();
	});
	$(".onlyedu_nav_show").bind("mouseleave", function(){			
  		onlyedu_extand();
	});

});


$(function(){
	$imageShow=$("#imageShow");
	$images=$("#imageSrc li",$imageShow);
	$imageSwitches=$("#imageSwitch li",$imageShow);

	if($images.size()>0){
	init();
	var timer=setInterval(autoSwitch,4000);
	$imageSwitches.each(function(index,item){
	$(item).mouseover(function(){
	clearInterval(timer);

	setTimeout(function(){clearInterval(timer);timer=setInterval(autoSwitch,4000)},1000);
	//	$imageSwitches.css('background-color','').eq(index).css('background-color','#EA2401');
		$imageSwitches.removeClass('on').eq(index).addClass("on");
			if(index!=$imageShow.data('show')){
				$imageShow.data('show',index);
				$images.hide().eq(index).fadeIn('slow');
			}
		})
	})
}

function autoSwitch(){
	$nowIndex=$imageShow.data('show')+1;
	if($images.size()>$nowIndex){
	//	$imageSwitches.css('background-color','').eq($nowIndex).css('background-color','#EA2401');
		$imageSwitches.removeClass('on').eq($nowIndex).addClass("on");
		$imageShow.data('show',$nowIndex);
		$images.hide().eq($nowIndex).fadeIn('slow');
	}else{
		init();
	}
}
//初始化到第一张图片开始
function init(){
	$imageShow.data('show',0);
	$images.hide().eq(0).fadeIn('slow');
//	$imageSwitches.css('background-color','').eq(0).css('background-color','#EA2401');
	$imageSwitches.removeClass('on').eq(0).addClass("on");
	}
});

jQuery.cookie = function(name, value, options) { 
    if (typeof value != 'undefined') { // name and value given, set cookie 
        options = options || {}; 
        if (value === null) { 
            value = ''; 
            options.expires = -1; 
        } 
        var expires = ''; 
        if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) { 
            var date; 
            if (typeof options.expires == 'number') { 
                date = new Date(); 
                date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000)); 
            } else { 
                date = options.expires; 
            } 
            expires = '; expires=' + date.toUTCString(); // use expires attribute, max-age is not supported by IE 
        } 
        var path = options.path ? '; path=' + options.path : ''; 
        var domain = options.domain ? '; domain=' + options.domain : ''; 
        var secure = options.secure ? '; secure' : ''; 
        document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join(''); 
    } else { // only name given, get cookie 
        var cookieValue = null; 
        if (document.cookie && document.cookie != '') { 
            var cookies = document.cookie.split(';'); 
            for (var i = 0; i < cookies.length; i++) { 
                var cookie = jQuery.trim(cookies[i]); 
                // Does this cookie string begin with the name we want? 
                if (cookie.substring(0, name.length + 1) == (name + '=')) { 
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1)); 
                    break; 
                } 
            } 
        } 
        return cookieValue; 
    } 
};

var isMobile = function(mobile){
	
	var format = /^1[358][0-9]{9}$/;
	
	if (!mobile.trim().match(format))
	{
		return false; 
	}
	return true;
}

var isEmail = function(email){
	if ((email.length > 128) || (email.length < 6))
	{
		return false;
	}
	
	var format = /^[A-Za-z0-9+]+[A-Za-z0-9\.\_\-+]*@([A-Za-z0-9\-]+\.)+[A-Za-z0-9]+$/;
	if (!email.trim().match(format))
	{
		return false; 
	}

	
	return true;
}


function initTab(){
	$.each( $(".tab"), function(){
						  
  		id =$(this).attr("id");
		
		myEvent = $('#'+id).attr("event");
		
		myEvent = typeof myEvent != 'undefined'? myEvent : 'mouseover';
			
		if (id.length>0){
			c = $('#'+id+ ' .tabmenu li');
			i=1;
			
			$.each( c, function(){
				
				$(this).bind(myEvent,{msg: i,url:$(this).attr('data'),iid:id}, function(event) {
					$('#'+event.data.iid+ ' .tabmenu li').removeClass("on");
					$(this).addClass("on");
					$('#'+event.data.iid+ ' .tabcon').hide();
					getTabcon('#'+event.data.iid+ '_'+event.data.msg, event.data.url);
				});
				i++;
						  
			});
		}
	});
}

function getTabcon(id, url){

	$(id).show();
	if(url && url.length>0){
		$.get(url, function(data){
  			$(id).html(data);
		});
	}	
}

$(document).ready(function(){
	initTab();
	
	if (pop_msg){
	
	$.dialog({
			id : 'pop_msg_dialog',
    		content:  pop_msg,
			title: '信息提示',
			fixed: true
		});
	}
});

function ini_global_login(){
	
	$("#uin_del").bind('click', function() {

		$("#u").val("");
		$(this).parent().prev('.label_focus').attr('class', 'label');
		$(this).parent().prev('.label').show();
		

		
	});
	
	$("#global_login_loading_img").attr('src', url+'skin/global/i/loading.gif');
	
	$("#u").bind({
	
		keyup : function() {

			if($("#u").val() ==''){
				$("#uin_del").hide();	
				$("#operate_tips").show().delay(4500).hide(0);			
			}else{
				$("#uin_del").show();				
			}
		},
		click: function(){
			$("#operate_tips").show().delay(4500).hide(0);	
		}
		
	});
	$("#p").bind('keypress', function(event) {		
		if(detectCapsLock(event)){		
			$("#caps_lock_tips").show().delay(3000).hide(0);
		}else{
			$("#caps_lock_tips").hide();
		}
		if(event.keyCode==13){
			//alert('fbf');
		}
		
	});
	

	$('.input_box').bind({
  		focusin: function() {			
    		this.className ='input_box_focus';
			$(this).prev('.label').attr('class', 'label_focus');		
			
  		},
 		focusout: function() {
			this.className ='input_box';
			$(this).prev('.label_focus').attr('class', 'label');
  		},
		keyup: function() {
			if ($(this).children('input').val() != ''){	

    			$(this).prev('.label_focus').hide();
			
			}else{
				$(this).prev('.label_focus').show();
				
			}			
  		},
		keydown: function() {
			$(this).prev('.label_focus').hide();
				
  		}
	});
	
	$('.input_box').prev('.label').bind({
  		focusin: function() {
			setTimeout(function(){ 
			$(this).next('.input_box').trigger("focus");
		}, 0); 
			
    	//	$(this).next('.input_box').attr('class', 'input_box_focus');	
	
  		}

	});	
	
	function global_login_err(msg){
		$("#err_m").html(msg)
		$("#error_tips").show().delay(4000).hide(0);
		
		
	}
	
	
	
	$('#login_button').bind('click', function() {
		$("#error_tips").hide();
		$("#operate_tips").hide();
	
		if($("#u").val() ==''){
			global_login_err('您还没有输入账号！');
			$("#u").focus();
			return false;
		}
		if(!isMobile($("#u").val()) && !isEmail($("#u").val())){
			global_login_err('账号为Email或手机号！');
			$("#u").focus();
			return false;
		}
		if($("#p").val() ==''){
			global_login_err('您还没有输入密码！');
			$("#p").focus();
			return false;
		}
		$("#error_tips").hide();


		$("#loading_tips").show();
		
				$.ajax({
					type : 'POST', 
					url: site_url+"/auth/auth/login/ajax",
					data: {submit:'1', ajax:"1" ,loginid:$("#u").val(), password:$("#p").val()},
					dataType: 'json',
					success: function (data) {
						$("#loading_tips").hide();
						$("#operate_tips").hide();
						if (data.code ==2){
							global_login_err(data.msg);
						}else if(data.code ==1){
							var dialog = $.dialog.get('global_login_dialog');
							dialog.close();
							$("#p").val('');
							$.dialog({id:"logindialog",content:'登录成功',time:3000,cancel:false,title: false,fixed:true});
							$("#global_user_box").html('<span class="tip">欢迎您，</span>'+data.user.nickname+' <a href="'+site_url+'/auth/auth/logout" class="global_logout_link">退出</a><span class="nav_split">|</span><a href="'+site_url+'/member/account">账号中心</a><span class="nav_split">|</span><a href="index.php">昂立日语</a>');
							if (typeof(global_login_callback) != 'undefined'){
								global_login_callback(data);
							}
						}
						
					}
						,
					error: function (e) {$("#loading_tips").hide();global_login_err("登录超时，请稍候再试");/*错误处理*/}
						,
					async:true,
					cache:false
				});	
		return false;
		
	});

	

	



}

function global_login(){
	
	if($("#global_login_box").length > 0){
		global_login_dialog();
	}else{
		$.get(site_url+"/auth/ajax/global_login_box", function(data){
			 $('body').append(data);
			 ini_global_login();
			 global_login_dialog();
		});
		
	}
	
	
}


function global_login_dialog(){
	//	$("#global_user_box").html('<span class="tip">您还未登录，请</span> <a href="'+site_url+'/member/auth"  class="global_login_link">登录</a>');
		$.dialog({
			id : 'global_login_dialog',
    		content:  document.getElementById("global_login_box"),
			title: '账号登录',
			fixed: true
		});
		
		$("#u").parent('.input_box').triggerHandler("focusin");
		$("#u").trigger('focus');
		if ($("#u").val() == ''){
			$("#u").val(get_cookie('loginid') === null ? '' : unescape(get_cookie('loginid')));
			if ($("#u").val() !=''){	
				
			}
		}
		$("#u").parent('.input_box_focus').triggerHandler("keyup");
		$("#u").triggerHandler("keyup");
}

function global_logout(){
//	$("#global_user_box").html($("#global_user_box").html());

	$.ajax({
			type : 'GET', 
			url: site_url+"/auth/auth/logout/ajax",
			success: function (data) {
						$("#global_user_box").html('<span class="tip">您还未登录，请</span> <a href="'+site_url+'/auth/auth"  class="global_login_link">登录</a><span class="nav_split">|</span><a href="'+site_url+'/member/auth/only">注册</a><span class="nav_split">|</span><span class="login_openid"><a href="'+site_url+'/auth/qq/" target="_blank">QQ登录</a></span><span class="nav_split">|</span><a href="http://www.onlyjp.cn">昂立日语</a>');
						
					},
			cache:false
				});	

	return true;



	//do_my();
	
}

function global_logout_dialog(){
	$.dialog({
		id : 'global_logout_dialog',
    	content:  "确认退出账户？",
		title: '账号退出',
		fixed: true,
		okValue: '确认',
    	ok: function () {
			global_logout();
			
			return true;

    	},
		cancelValue: '取消',
		cancel: function () {
       
    	}
	});
	
}


function detectCapsLock(C){var B=C.keyCode||C.which;var A=C.shiftKey||(B==16)||false;if(((B>=65&&B<=90)&&!A)||((B>=97&&B<=122)&&A)){return true}else{return false}}



$(function(){

	
	if ($("#global_user_box").attr('autoload') == '1'){
					
				var nickname = get_cookie('nickname');

				if( nickname === null || nickname.length < 1){
					$("#global_user_box").html('<span class="tip">您还未登录，请</span> <a href="'+site_url+'/auth/auth"  class="global_login_link">登录</a><span class="nav_split">|</span><a href="'+site_url+'/auth/auth/only">注册</a><span class="nav_split">|</span><span class="login_openid"><a href="'+site_url+'/auth/qq/" target="_blank">QQ登录</a></span><span class="nav_split">|</span><a href="http://www.onlyjp.cn">昂立日语</a>');
					
				}else{
					$("#global_user_box").html('<span class="tip">欢迎您，</span>'+nickname+' <a href="'+site_url+'/auth/auth/logout" class="global_logout_link">退出</a><span class="nav_split">|</span><a href="'+site_url+'/member/account">账号中心</a><span class="nav_split">|</span><a href="http://www.onlyjp.cn">昂立日语</a>');
				}
				
	}
	
	if ($("#global_user_box").attr('ajax') == '1'){
		
		$(".global_login_link").bind('click', function(){			
			global_login();		
			return false;		
		});	
		
		if ($("#global_user_box").attr('logout_dialog') == '1'){		
			$(".global_logout_link").bind('click', function(){			
				global_logout_dialog();
				return false;	
			});
			
		}else{
			$(".global_logout_link").bind('click', function(){			
				global_logout();	
				return false;		
			});
		}
	}

	

});
