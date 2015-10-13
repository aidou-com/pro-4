var sys_debug = false;
var userAgent = navigator.userAgent.toLowerCase();
var is_opera = userAgent.indexOf('opera') != -1 && opera.version();
var is_moz = (navigator.product == 'Gecko') && userAgent.substr(userAgent.indexOf('firefox') + 8, 3);
var is_ie = (userAgent.indexOf('msie') != -1 && !is_opera) && userAgent.substr(userAgent.indexOf('msie') + 5, 3);

var cookie_pre ='';

var gah = gah || {};

(function(){

	var config = {};

	var _domainHash,
		_utmz = '-',
		_length = "length",
		_substring = "substring",
		_o_math = Math,
		_getTime = "getTime",
		_split = "split",
		_push = "push",
		_toLowerCase = "toLowerCase";




	/**
     * 编码字符串。
     * @param uri {String} 要编码的字符串。
     * @param isAll {Boolean} 是否要全部（包含":"、"/"、";" 和 "?"。）编码。
     * @return {String} 编码后的字符串。
     */
    var encode = function(uri, isAll){
        var _encode = encodeURIComponent;
        if(_encode instanceof Function){
            return isAll ? encodeURI(uri) : _encode(uri);
        }else{
			return escape(uri);
        }
    },

	/**
	 * 解码字符串。
	 * @param encodedURI {String} 要编码的字符串。
	 * @param isAll {Boolean} 是否要全部（包含":"、"/"、";" 和 "?"。）解码，。
	 * @return {String} 解码后的字符串。
	 */
	decode = function(encodedURI, isAll){
		var _decode = decodeURIComponent,
			uri;
		encodedURI = encodedURI.split("+").join(" ");
		if(_decode instanceof Function){
			try{
				uri = isAll ? decodeURI(encodedURI) : _decode(encodedURI);
			}catch(ex){
				uri = unescape(encodedURI);
			}
		}else{
			uri = unescape(encodedURI);
		}
		return uri;
	};

    /**
     * 判断一个对象是否为空。
     * @param o {Object} 要判断的对象。
     * @return {Boolean} 是否为空。
     */
	var isEmpty = function(o){
        return (("undefined" == o) || ("-" == o) || ("" == o));
    };

    var getCookie = function(name) {
    	if (arguments.length === 0){
    		return document.cookie;
    	}
		var cookie_start = document.cookie.indexOf(name);
		var cookie_end = document.cookie.indexOf(";", cookie_start);
		return cookie_start == -1 ? '' : unescape(document.cookie.substring(cookie_start + name.length + 1, (cookie_end > cookie_start ? cookie_end : document.cookie.length)));
	};

	var setCookie = function(cookieName, cookieValue, seconds, path, domain, secure) {
		var expires = new Date();
		expires.setTime(expires.getTime() + seconds);
		document.cookie = escape(cookieName) + '=' + escape(cookieValue)
			+ (expires ? '; expires=' + expires.toGMTString() : '')
			+ (path ? '; path=' + path : '/')
			+ (domain ? '; domain=' + domain : '')
			+ (secure ? '; secure' : '');
	};

	/**
     * 设置配置信息的当前域名。
     */
    function getDomain(){
        if("auto" == config.domain){
            var domain = document.domain;
            if("www." == domain[_substring](0, 4)){
                domain = domain[_substring](4);
            }
            config.domain = domain;
        }
        config.domain = config.domain[_toLowerCase]();
    }

    /**
     * 获取域名哈希值。
     * @return {String} 域名哈希值。
     */
    var getDomainHash = function(){
        if(!config.domain || "" == config.domain || "none" == config.domain){
            config.domain = "";
            return 1;
        }
        getDomain();
        return config.allowHash ? Hash(config.domain) : 1;
    };

	/**
     * 哈希函数。
     * @param str {String} 需要哈希的字符串。
     * @return ｛String｝哈希的结果字符串。
     */
    var Hash = function(str){
        var hashData = 1,
            charCode = 0,
            idx;
    	if(!isEmpty(str)){
            hashData = 0;
            for(idx = str[_length] - 1; idx >= 0; idx--){
                charCode = str.charCodeAt(idx);
                hashData = (hashData << 6&268435455) + charCode+(charCode << 14);
                charCode = hashData&266338304;
                hashData = charCode != 0 ? hashData ^ charCode>>21 : hashData;
            }
        }
        return hashData;
    };
	/**
	 * 给数组添加元素。
	 * @param arr {Array} 要添加元素的数组。
	 * @param value {Object} 要添加的元素。
	 */
	var Push = function(arr, value){
		arr[_push];
		arr[arr[_length]] = value;
	};

   /**
     * 来源跟踪中的网址来源对象。
     * @param id {String}
     * @param source {String} 广告系列来源键，用于通过相应网址获取广告系列来源。在“广告系列”报告中，“来源”显示为一个细分选项。
     * @param clid {String}
     * @param campaign {String}
     * @param medium {String} 广告系列媒介键，用于通过广告系列网址获取其媒介。在“广告系列”报告中，该媒介显示为一个细分选项。
     * @param term {String} 广告系列字词，用于通过相应网址获取广告系列关键字。
     * @param content {String} 广告系列的广告内容,用于通过广告系列的网址获取其内容 (description)。
     */

    var Source = function(id, source, clid, campaign, medium, term, content){
        this.id = id;
        this.source = source;
        this.clid = clid;
        this.campaign = campaign;
        this.medium = medium;
        this.term = term;
        this.content = content;
        this.serialize = function(){
            var source = [],
                map = [["cid", this.id], ["csr", this.source], ["gclid", this.clid], ["ccn", this.campaign], ["cmd", this.medium], ["ctr", this.term], ["cct", this.content]],
                i,
                value;
            if(this.checkSelfIntegrity()){
                for(i = 0; i < map.length; i++){
                    if( ! isEmpty(map[i][1])){
                        value = map[i][1].split("+").join("%20");
                        value = value.split(" ").join("%20");
                        Push(source, "utm" + map[i][0] + "=" + value);
                    }
                }
            }
            return source.join("|");
        };
        /**
         * 检查自身属性数据信息的完整性。
         * @return {Boolean} 检查结果。
         */
        this.checkSelfIntegrity = function(){
            return !(isEmpty(this.id) && isEmpty(this.source) && isEmpty(this.clid));
        };
        /**
         * 根据MAP字典初始化对象的属性。
         * @param map {Object} MAP字典。
         */
        this.initialize = function(map){
            var _get = function(key){
                return decode(gah.pick(map, "utm" + key + "=", "|"));
            };
            this.id = _get("cid");
            this.source = _get("csr");
            this.clid = _get("gclid");
            this.campaign= _get("ccn");
            this.medium = _get("cmd");
            this.term = _get("ctr");
            this.content = _get("cct");
        }
    };

	gah.init = function(gaq){
		for(var i = 0; i < gaq.length; i++){
			if (gaq[i][0] === '_setDomainName'){
				config.domain = gaq[i][1];
			}else if (gaq[i][0] === '_setAllowHash'){
				config.allowHash = gaq[i][1];
			}else if (gaq[i][0] === '_setCookiePath'){
				config.cookiePath = gaq[i][1];
			}else if (gaq[i][0] === '_setCampaignCookieTimeout'){
				config.campaignCookieTimeout = gaq[i][1];
			}else if (gaq[i][0] === '_setCampNOKey'){
				config.nooverride = gaq[i][1];
			}
			
		}
		if ( ! config.domain){
			config.domain = "auto";
		}
		if ( typeof config.allowHash === "undefined"){
			config.allowHash = 1;
		}
		if ( ! config.campaignCookieTimeout){
			config.campaignCookieTimeout = 15768E6;
		}
		if ( ! config.cookiePath){
			config.cookiePath = '/';
		}
		if ( ! config.nooverride){
			config.nooverride = 'utm_nooverride';
		}
	};

	/**
	 * 从数据字典（键值对）中捡选指定键的值。
	 *  @param map {String} 数据字典（键值对）。
	 *  @param key {String} 键。
	 *  @param separator {String} 分隔符。
	 *  @return {String} 取出的值。
	 */
	gah.pick = function(map, key, separator){
		var result = "-",
			idx;
		if(!isEmpty(map) && !isEmpty(key) && !isEmpty(separator)){
			idx = map.indexOf(key);
			if(idx > -1){
				var endIdx = map.indexOf(separator, idx);
				if(endIdx < 0){
					endIdx = map.length;
				}
				result = map.substring(idx + key.indexOf("=") + 1, endIdx);
			}
		}
		return result;
	};

	gah.utmz = function(gaq){

		var arrUTMZ,
			_source,
			_timestamp,
			b,
			_utmz;

		var _url =  document.location.href,
			_prefix = "dou_",
			_referrer = document.referrer,
			q = 0;


		var _utm_id = gah.pick(_url, _prefix + "id=", "&"),
			_utm_source = gah.pick(_url, _prefix + "source=", "&"),
			_utm_clid = gah.pick(_url, _prefix + "clid=", "&"),
			_utm_campaign = gah.pick(_url, _prefix + "campaign=", "&"),
			_utm_medium = gah.pick(_url, _prefix + "medium=", "&"),
			_utm_term = gah.pick(_url, _prefix + "term=", "&"),
			_utm_content = gah.pick(_url, _prefix + "content=", "&"),
			_utm_nooverride = gah.pick(_url, config.nooverride + "=", "&");

		if (isEmpty(_utm_id) && isEmpty(_utm_source) && isEmpty(_utm_clid) && isEmpty(_utm_campaign) && isEmpty(_utm_medium) && isEmpty(_utm_term)  && isEmpty(_utm_content)){
			return;
		}

		if ( ! _utm_nooverride){
			window.gaq.push('_setCampNOKey', _prefix + 'source');
		}

		if (gaq){
			gah.init(gaq);
		}



		if (_utm_source == 'baidu'){
			if (isEmpty(_utm_term)){
				_utm_term = pick(_referrer, 'wd=', '&') || pick(_referrer, 'word=', '&') || pick(_referrer, 'q1=', '&');
			}			
		}

		_source = new Source(_utm_id, _utm_source, _utm_clid, _utm_campaign, _utm_medium, _utm_term, _utm_content);


		_utmz = getCookie('__utmz');

		if( ! isEmpty(_utmz)){
			q = _utmz.split(".");
	        b = new Source;
	        b.initialize(q.slice(4).join("."));
	        b = b.serialize().toLowerCase() == _source.serialize().toLowerCase();
	        q = q[3] * 1
		}

		_domainHash = getDomainHash();
		var cookie = getCookie();

		if(!b){
			cookie = gah.pick(cookie, "__utma=" + _domainHash + ".", ";");
			b = cookie.lastIndexOf(".");
			cookie = b > 9 ? cookie.substring(b + 1) * 1 : 0;
			q++;
			cookie = 0 == cookie ? 1 : cookie;

			_timestamp = _o_math.round((new Date)[_getTime]()/1E3);

			var utmz =[_domainHash, _timestamp, cookie, q, _source.serialize()].join(".");

			//console.log(utmz);

			setCookie("__utmz", utmz, config.campaignCookieTimeout, config.cookiePath, config.domain);
		}
			
 		//	gaCookie.setUTMZ([_domainHash, oThis.timestamp, cookie, q, _source.serialize()][_join]("."));
          //                  gaCookie.setUTMZCookie()
            //            }

	};


})();

function $o(obj)
{
	return document.getElementById(obj);
}

function get_radio_value(objname){
//	var obj = $('objname');
	var obj = document.all[objname];
	for(i=0;i<obj.length;i++){
   		if(obj[i].checked == true){
   			return obj[i].value;
		}
    }
	
}

String.prototype.trim = function()
{
    return this.replace(/(^[\s]*)|([\s]*$)/g, "");
}
String.prototype.lTrim = function()
{
    return this.replace(/(^[\s]*)/g, "");
}
String.prototype.rTrim = function()
{
    return this.replace(/([\s]*$)/g, "");
}

function isUndefined(variable) {
	return typeof variable == 'undefined' ? true : false;
}

function my_getbyid(id)
{
   itm = null;
   if (document.getElementById)
   {
      itm = document.getElementById(id);
   }
   else if (document.all)
   {
      itm = document.all[id];
   }
   else if (document.layers)
   {
      itm = document.layers[id];
   }
   
   return itm;
}

function show(s_id,max,sel)
{ 

	for(i=1;i<=max;i++)
	{
		$o(s_id + i).style.display = 'none';	
		$o(s_id + i + '_a').className = '';
	}
	$o(s_id + sel).style.display = 'block';
	$o(s_id + sel + '_a').className = 'over';
} 

/**
 * ??
 */
function checkall(form, prefix, checkall) {
	var checkall = checkall ? checkall : 'chkall';
	for(var i = 0; i < form.elements.length; i++) {
		var e = form.elements[i];
		if(e.name != checkall && (!prefix || (prefix && e.name.match(prefix)))) {
			e.checked = form.elements[checkall].checked;
		}
	}
}

function bigshow(element,url,width,height,images,links,texts)
{
	if (!my_getbyid(element)) return;
	var borderwidth = width + 2;
	var borderheight = height + 2;
	var str = '';
	str += '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,9,0" width="'+ width +'" height="'+ height +'">';
	str += '<param name="allowScriptAccess" value="sameDomain"><param name="movie" value="'+url+'"><param name="quality" value="high"><param name="bgcolor" value="#ffffff">';
	str += '<param name="menu" value="false"><param name=wmode value="opaque">';
	str += '<param name="FlashVars" value="pics='+images+'&amp;links='+links+'&amp;texts='+texts+'&amp;borderwidth='+borderwidth+'&amp;borderheight='+borderheight+'&amp;textheight=0">';
	str += '<embed src="'+url+'" wmode="opaque" FlashVars="pics='+images+'&amp;links='+links+'&amp;texts='+texts+'&amp;borderwidth='+borderwidth+'&amp;borderheight='+borderheight+'&amp;textheight=0" menu="false" bgcolor="#ffffff" quality="high" width="'+ width +'" height="'+ height +'" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />';
	str += '</object>';
	my_getbyid(element).innerHTML = str;
}

function strlen(str) {
	return (is_ie && str.indexOf('\n') != -1) ? str.replace(/\r?\n/g, '_').length : str.length;
}

function get_cookie(name){
	return $.cookie(cookie_pre + name);
}

function delete_cookie(name){
	$.cookie(cookie_pre + name,null,{path:'/'});
}

function getcookie(name) {
	var cookie_start = document.cookie.indexOf(name);
	var cookie_end = document.cookie.indexOf(";", cookie_start);
	return cookie_start == -1 ? '' : unescape(document.cookie.substring(cookie_start + name.length + 1, (cookie_end > cookie_start ? cookie_end : document.cookie.length)));
}


function setcookie(cookieName, cookieValue, seconds, path, domain, secure) {
	var expires = new Date();
	expires.setTime(expires.getTime() + seconds);
	document.cookie = escape(cookieName) + '=' + escape(cookieValue)
		+ (expires ? '; expires=' + expires.toGMTString() : '')
		+ (path ? '; path=' + path : '/')
		+ (domain ? '; domain=' + domain : '')
		+ (secure ? '; secure' : '');
}

function in_array(needle, haystack) {
	if(typeof needle == 'string' || typeof needle == 'number') {
		for(var i in haystack) {
			if(haystack[i] == needle) {
					return true;
			}
		}
	}
	return false;
}

function select_option(sel,opt){
	var selobj = document.all[sel];
	var len = selobj.options.length;
	for (var i=0;i<len;i++) {
		if(selobj.options[i].value == opt) {
	    	selobj.options[i].selected=true;
		}
	}
}


function radio_checked(objname, checkedvalue){
	var obj = document.all[objname];
	
	var len = obj.length;
	if (checkedvalue == ''){
		checkedvalue = 0;
	}
	if (!len){
		var objvalue = obj.value;
		if(objvalue == checkedvalue) {
	    	obj.checked=true;
		}
		
	}else{
	for (var i=1;i<=len;i++) {
		var objvalue = obj[i-1].value;
		if(objvalue == checkedvalue) {
	    	obj[i-1].checked=true;
		}
	}
	}
}




function write_login_info(){
	nickname = getcookie('nickname');

	if (nickname){
		document.write('您好，'+unescape(nickname)+'！[<a href="'+url+'myonly/">我的昂立</a>] [<a href="logout.php">退出</a>]');
	}else{
		login_url = url + 'myonly/login.php';
		reg_url = url + 'myonly/only.php';
		lo = document.location.href;
		if(lo.indexOf(login_url) == -1){ 
			
			if(lo.indexOf(reg_url) == -1 ){ 
				reg_url = reg_url + '?url=' + escape(lo);
				login_url = login_url + '?url=' + escape(lo);
			}else{
				if (lo.indexOf('url=')!=-1){
					login_url = login_url + '?'+ lo.substring(lo.indexOf('url='));
				}	
				reg_url = '#';
			}
		}else{
			if (lo.indexOf('url=')!=-1){
				reg_url = reg_url + '?'+ lo.substring(lo.indexOf('url='));
			}			
			login_url = '#';
		}

		document.write('您好，欢迎来到昂立新日语！[<a href="'+login_url+'">请登录</a>] [<a href="'+reg_url+'">免费注册</a>]');
	}
}


function changeContent(i,j){
		var div1 = document.getElementById(i);
		var div2 = document.getElementById(j);
		div1.style.display = "none";
		div2.style.display = "block";
	}
	function isMouseLeaveOrEnter(e, handler) {   
    if (e.type != 'mouseout' && e.type != 'mouseover') return false;   
    var reltg = e.relatedTarget ? e.relatedTarget : e.type == 'mouseout' ? e.toElement : e.fromElement;   
    while (reltg && reltg != handler)   
        reltg = reltg.parentNode;   
    return (reltg != handler);   
}

function _uGC(l,n,s){
	if(!l || l=="" || !n || n=="" || !s || s=="") return "-";
	var i,i2,i3,c="-";
	i=l.indexOf(n);
	i3=n.indexOf("=")+1;
	if(i > -1){
		i2 = l.indexOf(s,i); if(i2 < 0) { i2 = l.length; }
		c = l.substring((i+i3), i2);
	}
	return c;
}