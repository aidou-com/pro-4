/* global, $, siteUrl */
/* jshint nonstandard:true */
/* jshint noarg:false */

var gaHelper = (function(gah){

	var config = {},
		_domainHash,

    /*
     * 解码字符串。
     * @param encodedURI {String} 要编码的字符串。
     * @param isAll {Boolean} 是否要全部（包含":"、"/"、";" 和 "?"。）解码，。
     * @return {String} 解码后的字符串。
     */
    decode = function(encodedURI, isAll){
        var _decode = decodeURIComponent,
            uri;
        encodedURI = encodedURI.split('+').join(' ');
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
    },

    documentReady = function (f){
      var ie = !!(window.attachEvent && !window.opera),
          wk = /webkit\/(\d+)/i.test(navigator.userAgent) && (RegExp.$1 < 525),  
          fn = [],   
          run = function () {   
            for (var i = 0; i < fn.length; i++) {
              fn[i]();
            } 
          }, 
          d = document; 
      if (!ie && !wk && d.addEventListener) { 
        return d.addEventListener('DOMContentLoaded', f, false); 
      }  
      if (fn.push(f) > 1) {
        return; 
      }   
      if (ie) {
        (function (){   
          try {   
            d.documentElement.doScroll('left');   
            run();   
          }   
          catch (err) {   
            setTimeout(arguments.callee, 0);  
          }   
        })();
      }else if (wk) {
        var t = setInterval(function (){    
          if (/^(loaded|complete)$/.test(d.readyState)){  
            clearInterval(t);
            run();
          }
          }, 0);
      }  
    },

    /*
     * 编码字符串。
     * @param uri {String} 要编码的字符串。
     * @param isAll {Boolean} 是否要全部（包含":"、"/"、";" 和 "?"。）编码。
     * @return {String} 编码后的字符串。
     */
	encode = function(uri, isAll){
        var _encode = encodeURIComponent;
        if(_encode instanceof Function){
            return isAll ? encodeURI(uri) : _encode(uri);
        }else{
			return escape(uri);
        }
    },

    getCookie = function(name) {
        if (arguments.length === 0){
            return document.cookie;
        }
        var cookie_start = document.cookie.indexOf(name);
        var cookie_end = document.cookie.indexOf(';', cookie_start);
        return cookie_start === -1 ? '' : document.cookie.substring(cookie_start + name.length + 1, (cookie_end > cookie_start ? cookie_end : document.cookie.length));
    },

    /*
     * 设置配置信息的当前域名。
     */
    getDomain = function(){
        if('auto' === config.domain){
            var domain = document.domain;
            if('www.' === domain.substring(0, 4)){
                domain = domain.substring(4);
            }
            config.domain = domain;
        }
        config.domain = config.domain.toLowerCase();
    },

    /*
     * 获取域名哈希值。
     * @return {String} 域名哈希值。
     */
    getDomainHash = function(){
        if(!config.domain || '' === config.domain || 'none' === config.domain){
            config.domain = '';
            return 1;
        }
        getDomain();
        return config.allowHash ? hash(config.domain) : 1;
    },

    /**
     * 生成访问者ID。
     * @return {String} 访问者ID。
     */
    getVisitorId = function(){
        /*
         * 2,147,483,647（二十一亿四千七百四十八万三千六百四十七）是2147483646与2147483648之间的自然数，
         * 也是欧拉在1772年所发现的一个梅森素数，它等于2^31 -1，是32位操作系统中最大的符号型整型常量。
         */
        return random() ^ hashClientInfo() & 2147483647;
    },

    /*
     * 哈希函数。
     * @param str {String} 需要哈希的字符串。
     * @return ｛String｝哈希的结果字符串。
     */
    hash = function(str){
        var hashData = 1,
            charCode = 0,
            idx;
        if(!isEmpty(str)){
            hashData = 0;
            for(idx = str.length - 1; idx >= 0; idx--){
                charCode = str.charCodeAt(idx);
                hashData = (hashData << 6&268435455) + charCode+(charCode << 14);
                charCode = hashData&266338304;
                hashData = charCode !== 0 ? hashData ^ charCode>>21 : hashData;
            }
        }
        return hashData;
    },

    /**
     * 获取客户端信息的哈希值。
     * @return {String} 客户端信息的哈希值。
     */
    hashClientInfo = function(){
        var navigator = window.navigator,
        language = (navigator && navigator.language ? navigator.language : navigator && navigator.browserLanguage ? navigator.browserLanguage : '-').toLowerCase(),
        javaEnabled = navigator && navigator.javaEnabled() ? 1 : 0,
        screen = screen ? screen.width + 'x' + screen.height : '-',
        colorDepth = screen ? screen.colorDepth + '-bit' : '-',
        history_length = window.history.length;

        navigator= navigator.appName + navigator.version + language + navigator.platform + navigator.userAgent + javaEnabled + screen + colorDepth + (document.cookie ? document.cookie : '') + (document.referrer ? document.referrer : '');
        for(var len = navigator.length; history_length > 0; ){
            navigator += history_length-- ^ len++;
        }
        return hash(navigator);
    },

    /*
     * 判断一个对象是否为空。
     * @param o {Object} 要判断的对象。
     * @return {Boolean} 是否为空。
     */
    isEmpty = function(o){
        return (('undefined' === o) || ('-' === o) || ('' === o));
    },

    /*
     * 给数组添加元素。
     * @param arr {Array} 要添加元素的数组。
     * @param value {Object} 要添加的元素。
     */
    push = function(arr, value){
        arr.push();
        arr[arr['length']] = value;
    },

    /**
     * 取随机整数。
     * @return 随机的整数。
    */
    random = function(){
        /*
         * 2,147,483,647（二十一亿四千七百四十八万三千六百四十七）是2147483646与2147483648之间的自然数，
         * 也是欧拉在1772年所发现的一个梅森素数，它等于2^31 -1，是32位操作系统中最大的符号型整型常量。
         */
        return Math.round(Math.random() * 2147483647);
    },

    setCookie = function(cookieName, cookieValue, seconds, path, domain, secure) {
        var expires = new Date();
        expires.setTime(expires.getTime() + seconds);
        document.cookie = cookieName + '=' + cookieValue +
            (expires ? '; expires=' + expires.toGMTString() : '') +
            (path ? '; path=' + path : '/') +
            (domain ? '; domain=' + domain : '') +
            (secure ? '; secure' : '');
    },

    /*
     * 来源跟踪中的网址来源对象。
     * @param id {String}
     * @param source {String} 广告系列来源键，用于通过相应网址获取广告系列来源。在“广告系列”报告中，“来源”显示为一个细分选项。
     * @param clid {String}
     * @param campaign {String}
     * @param medium {String} 广告系列媒介键，用于通过广告系列网址获取其媒介。在“广告系列”报告中，该媒介显示为一个细分选项。
     * @param term {String} 广告系列字词，用于通过相应网址获取广告系列关键字。
     * @param content {String} 广告系列的广告内容,用于通过广告系列的网址获取其内容 (description)。
     */
    Source = function(id, source, clid, campaign, medium, term, content){
        this.id = id;
        this.source = source;
        this.clid = clid;
        this.campaign = campaign;
        this.medium = medium;
        this.term = term;
        this.content = content;
        this.serialize = function(){
            var source = [],
                map = [['cid', this.id], ['csr', this.source], ['gclid', this.clid], ['ccn', this.campaign], ['cmd', this.medium], ['ctr', this.term], ['cct', this.content]],
                i,
                value;
            if(this.checkSelfIntegrity()){
                for(i = 0; i < map.length; i++){
                    if( ! isEmpty(map[i][1])){
                        value = map[i][1].split('+').join('%20');
                        value = value.split(' ').join('%20');
                        push(source, 'utm' + map[i][0] + '=' + value);
                    }
                }
            }
            return source.join('|');
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
                return decode(gah.pick(map, 'utm' + key + '=', '|'));
            };
            this.id = _get('cid');
            this.source = _get('csr');
            this.clid = _get('gclid');
            this.campaign= _get('ccn');
            this.medium = _get('cmd');
            this.term = _get('ctr');
            this.content = _get('cct');
        };
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
            config.domain = 'auto';
        }
        if ( typeof config.allowHash === 'undefined'){
            config.allowHash = 1;
        }
        if ( ! config.campaignCookieTimeout){
            config.campaignCookieTimeout = 15768E6;
        }
        if ( ! config.visitorCookieTimeout){
            config.visitorCookieTimeout = 63072E6;
        }
        if ( ! config.sessionCookieTimeout){
            config.sessionCookieTimeout = 18E5;
        }
        if ( ! config.cookiePath){
            config.cookiePath = '/';
        }
        if ( ! config.nooverride){
            config.nooverride = 'utm_nooverride';
        }
    };

    gah.form = function(formId){
      var form,
          forms,
          _utmz,
          div,
          i,
          tempInput,
          inputList = [],
          arg = arguments;

      _utmz = getCookie('__utmz');

      inputList.push(['dou_source', gah.pick(_utmz, 'utmcsr=', '|')]);
      inputList.push(['dou_clid', gah.pick(_utmz, 'gclid=', '|')]);
      inputList.push(['dou_campaign', gah.pick(_utmz, 'utmccn=', '|')]);
      inputList.push(['dou_medium', gah.pick(_utmz, 'utmcmd', '|')]);
      inputList.push(['dou_term', gah.pick(_utmz, 'utmctr=', '|')]);
      inputList.push(['dou_content', gah.pick(_utmz, 'utmcct=', '|')]);

      documentReady(function (){

        div = document.createElement('div');

        for (i=0; i<inputList.length; i++ ){
          tempInput = document.createElement('input');
          tempInput.type = 'hidden';
          tempInput.name = inputList[i][0];
          tempInput.value = inputList[i][1] === '-' ? '' : inputList[i][1];
          div.appendChild(tempInput); 
        }         

        if (arg.length === 0){
          forms = document.getElementsByTagName('form');
          for(i=0; i<forms.length; i++){
            forms[i].appendChild(div); 
          }

        }else{
          form = document.getElementById(formId);
          if (form) {
            form.appendChild(div);
          }
        } 
      });
    };

    /**
     * 从数据字典（键值对）中捡选指定键的值。
     *  @param map {String} 数据字典（键值对）。
     *  @param key {String} 键。
     *  @param separator {String} 分隔符。
     *  @return {String} 取出的值。
     */ 
    gah.pick = function(map, key, separator){
        var result = '-',
            idx;
        if(!isEmpty(map) && !isEmpty(key) && !isEmpty(separator)){
            idx = map.indexOf(key);
            if(idx > -1){
                var endIdx = map.indexOf(separator, idx);
                if(endIdx < 0){
                    endIdx = map.length;
                }
                result = map.substring(idx + key.indexOf('=') + 1, endIdx);
            }
        }
        return result;
    };

    gah.utm = function(gaq){

        var arrUTMZ,
            _source,
            _timestamp,
            b,
            i,
            _utma,
            _utmb,
            _utmc,
            _utmz;

        var _url =  document.location.href,
            _prefix = 'dou_',
            _referrer = document.referrer,
            q = 0;


        var _utm_id = gah.pick(_url, _prefix + 'id=', '&'),
            _utm_source = gah.pick(_url, _prefix + 'source=', '&'),
            _utm_clid = gah.pick(_url, _prefix + 'clid=', '&'),
            _utm_campaign = gah.pick(_url, _prefix + 'campaign=', '&'),
            _utm_medium = gah.pick(_url, _prefix + 'medium=', '&'),
            _utm_term = gah.pick(_url, _prefix + 'term=', '&'),
            _utm_content = gah.pick(_url, _prefix + 'content=', '&'),
            _utm_nooverride;


        if (isEmpty(_utm_id) && isEmpty(_utm_source) && isEmpty(_utm_clid) && isEmpty(_utm_campaign) && isEmpty(_utm_medium) && isEmpty(_utm_term)  && isEmpty(_utm_content)){
            return;
        }

        if (gaq){
            gah.init(gaq);
        }

        _utm_nooverride = gah.pick(_url, config.nooverride + '=', '&');
        
        if ( isEmpty(_utm_nooverride)){
            window._gaq.push(['_setCampNOKey', _prefix + 'nooverride']);            
        }        
        window._gaq.push(['_setCampSourceKey', _prefix + 'source']);

        /*
        if (_utm_source === 'baidu'){
            if (isEmpty(_utm_term)){
                _utm_term = gah.pick(_referrer, 'wd=', '&') || gah.pick(_referrer, 'word=', '&') || gah.pick(_referrer, 'q1=', '&');
            }           
        }
        */

        var organicData = 'daum:q,eniro:search_word,naver:query,pchome:q,images.google:q,google:q,yahoo:p,yahoo:q,msn:q,bing:q,aol:query,aol:encquery,aol:q,lycos:query,ask:q,altavista:q,netscape:query,cnn:query,about:terms,mamma:q,alltheweb:q,voila:rdata,virgilio:qs,live:q,baidu:wd,alice:qs,yandex:text,najdi:q,mama:query,seznam:q,search:q,wp:szukaj,onet:qt,szukacz:q,yam:k,kvasir:q,sesam:q,ozu:q,terra:query,mynet:q,ekolay:q,rambler:query,rambler:words';

        if (isEmpty(_utm_term)){
          organicData = organicData.split(',');
          var item;
          for(i=0; i<organicData.length; i++){
            if (isEmpty(_utm_term)){
              item = organicData[i].split(':');
              if (item[0] === _utm_source){
                _utm_term = gah.pick(_referrer, item[1]+'=', '&');
              }
            }
          }
        }

        // 外置有值时，不进行循环检查
        if (isEmpty(_utm_term)){
          for(i=0; i<gaq.length; i++){
            // 循环检查到值时，不进行循环检查
            if (isEmpty(_utm_term)){
              if (gaq[i][0] === '_addOrganic'){
                if (gaq[i][1] === _utm_source){
                  _utm_term = gah.pick(_referrer, gaq[i][2]+'=', '&');
                }
              }
            }
          }
        }    

        _source = new Source(_utm_id, _utm_source, _utm_clid, _utm_campaign, _utm_medium, _utm_term, _utm_content);


        _utmz = getCookie('__utmz');
        _domainHash = getDomainHash();
        _timestamp = Math.round((new Date()).getTime()/1E3);

        if( ! isEmpty(_utmz)){
            q = _utmz.split('.');
            b = new Source();
            b.initialize(q.slice(4).join('.'));
            b = b.serialize().toLowerCase() === _source.serialize().toLowerCase();
            q = q[3] * 1;
        }else{
            _utma = [_domainHash, getVisitorId(), _timestamp, _timestamp, _timestamp, 0].join('.');
            setCookie('__utma', _utma, config.visitorCookieTimeout, config.cookiePath, config.domain);

         //   _utmb = [_domainHash, 1, 10, _timestamp].join('.');
          //  setCookie('__utmb', _utmb, config.sessionCookieTimeout, config.cookiePath, config.domain);

          //  _utmc = _domainHash;
          //  setCookie('__utmc', _utmc, 0, config.cookiePath, config.domain);

         //   console.log('__utma=', _utma);
         //   console.log('__utmb=', _utmb);
         //   console.log('__utmc=', _utmc);
        }
        
        var cookie = getCookie();

        if(!b){
            cookie = gah.pick(cookie, '__utma=' + _domainHash + '.', ';');
            b = cookie.lastIndexOf('.');
            cookie = b > 9 ? cookie.substring(b + 1) * 1 : 0;
            q++;
            cookie = 0 === cookie ? 1 : cookie;
            

            var utmz =[_domainHash, _timestamp, cookie, q, _source.serialize()].join('.');

            //console.log('utmz', utmz);

            setCookie('__utmz', utmz, config.campaignCookieTimeout, config.cookiePath, config.domain);
        }

      //  console.log(getCookie('__utmz'));
            
        //  gaCookie.setUTMZ([_domainHash, oThis.timestamp, cookie, q, _source.serialize()][_join]("."));
          //                  gaCookie.setUTMZCookie()
            //            }

    };

	return gah;

})(gaHelper || {});