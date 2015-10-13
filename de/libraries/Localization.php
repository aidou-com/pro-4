<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Localization {

	private $CI;
	private $local_url;
	private $local;
	private $dir;
	private $city_list;

	function __construct($config)
	{
		$this->CI =& get_instance();

		$this->CI->load->helper('cookie');
		
		$this->city_list = $config;

		$this->get(); 
		$this->set();

	}

	
	public function get()
	{
		$return = FALSE;

		if ($return = $this->fetch_var())
		{
			return $return;
		}


		if ($return = $this->fetch_domain())
		{
			return $return;
		}

		if ($return = $this->fetch_dir())
		{
			return $return;
		}


		if ($return = $this->fetch_cookie())
		{
			return $return;
		}

		if ($return = $this->fetch_ip())
		{
			$this->set();
			return $return;
		}

		$rand_key = array_rand($this->city_list);

		$return = $this->local = $this->city_list[$rand_key];
		
		$this->set();

		return $return;

	}

	public function get_city_list()
	{
		return $this->city_list;
	}

	public function get_local()
	{
		return $this->local;
	}

	public function fetch_var($var = NULL)
	{
		$return = FALSE;

		if ($this->CI->input->get('local-code'))
		{
			$local_code = $this->CI->input->get('local-code');
			foreach($this->city_list as $k=>$v)
			{
				if($v['code'] == $local_code)
				{
					$return = $v;
				}
			}	
		}

		return $this->local = $return;
	}

	public function fetch_cookie()
	{
		$return = FALSE;

		$local_data = get_cookie('local_data');

		$local_list = explode('|', $local_data);

		if ( ! empty($local_data) && is_array($local_list) && $local_list[2] == $this->CI->input->ip_address())
		{
			$local_code = $local_list[0];
			if (isset($this->city_list[$local_code]))
			{
				$return = $this->city_list[$local_code];
			}
		}

		return $this->local = $return;
	}

	public function fetch_dir($dir = NULL)
	{
		$return = FALSE;


		if (is_null($dir))
		{
			$uri = $_SERVER["REQUEST_URI"];

			$uris = explode('/', $_SERVER["REQUEST_URI"]);

			if (isset($uris[1]))
			{
				$dir = $uris[1];
			}
		}

		if (! empty($dir))
		{
			foreach($this->city_list as $k=>$v)
			{

				if($v['dir'] == $dir)
				{

					$return = $v;
				}
			}			
		}



		return $this->local = $return;
	}

	public function fetch_domain($domain = NULL)
	{
		$return = FALSE;

		if (is_null($domain))
		{
			$domain = $this->CI->input->server('HTTP_HOST');
		}		

		foreach($this->city_list as $k=>$v)
		{
			if($v['domain'] == $domain)
			{
				$return = $v;
			}
		}

		return $this->local = $return;
	}

	public function fetch_ip($ip = NULL)
	{
		$return = FALSE;

		if (is_null($ip))
		{
			$ip = $this->CI->input->ip_address();
		}
//		$ip = '114.89.189.229';

		$url = 'http://api.map.baidu.com/location/ip?ak=FD0c437d97c9aedf2b4031afb1f52f5c&ip='.$ip;
		
		$handle = fopen($url, "rb");
		$contents = @stream_get_contents($handle);
		fclose($handle);

		$data = json_decode($contents);


		if ($data->status == 0)
		{
			$data_list = explode('|', $data->address);
			$city_name = $data_list[2];

			foreach($this->city_list as $k=>$v)
			{
				if($v['city'] == $city_name)
				{
					$return = $v;
				}
			}
		}		

		return $this->local = $return;
	}

	protected function set()
	{

		$value = $this->local['code'].'|'.time().'|'.$this->CI->input->ip_address();
		$cookie = array(
		    'name'   => 'local_data',
		    'value'  => $value,
		    'expire' => '86400000'
		);

		set_cookie($cookie);

	}

	public function set_local($code)
	{
		foreach($this->city_list as $k=>$v)
		{
			if($v['code'] == $code)
			{
				$this->local = $v;
				$this->set();
				return TRUE;
			}
		}
		return FALSE;
	}

	public function fetch_url($data)
	{		
		
		$local = '';
		
		$dir_list = array();
		
		foreach($data as $k=>$v)
		{
			if(($v['domain'] == $this->CI->input->server('HTTP_HOST') && $v['dir'] == '') OR ($v['domain'] == $this->CI->input->server('HTTP_HOST') && $v['dir'] == $this->CI->uri->segment(1)))
			{
			
				$local = $k;
			//	break;
			}
			$dir_list[] = $v['dir'];
		}
		
		if( empty($local))
		{
			
			$local = $this->fetch_ip($this->CI->input->ip_address());
			
			if( empty($local))
			{
				$local = 'sh';
			}
			
			$this->local_url = $this->CI->config->item('base_url');
			
		}
		else
		{
		
			$base_url = $this->CI->config->item('base_url');
			$base_domain = parse_url($base_url, PHP_URL_HOST);
			
			if($data[$local]['domain'] != $base_domain)
			{
				$this->local_url = str_replace($base_domain, $data[$local]['domain'], $base_url);
			}
			else
			{
				$this->local_url = $this->CI->config->item('base_url');
			}
			
			if ($data[$local]['dir'] != '')
			{		
				$this->dir = $data[$local]['dir'];								
			}
			
		/*	
			
			if($data[$local]['domain'] != $base_domain)
			{
				$base_url = str_replace($base_domain, $data[$local]['domain'], $base_url);
				$this->CI->config->set_item('base_url', $base_url);
			}
			
			if ($data[$local]['dir'] != '')
			{		
				if ($this->CI->config->item('enable_query_strings') == FALSE)
				{
					$this->CI->config->set_item('index_page', $this->CI->config->item('index_page').'/'.$data[$local]['dir']);
				}
											
			}
			*/
			if(in_array($this->CI->uri->segment(1), $dir_list) && $data[$local]['dir'] != $this->CI->uri->segment(1))
			{
				show_404();
			}
		}
		
		$this->local = $local;
		return $local;


	}
	
	public function site_url($uri = '')
	{
		if ($uri == '')
		{
			return $this->slash_item($this->local_url).$this->CI->config->slash_item('index_page').$this->slash_item($this->dir);
		}

		if ($this->CI->config->item('enable_query_strings') == FALSE)
		{
			$suffix = ($this->CI->config->item('url_suffix') == FALSE) ? '' : $this->CI->config->item('url_suffix');
			return $this->slash_item($this->local_url).$this->CI->config->slash_item('index_page').$this->slash_item($this->dir).$this->_uri_string($uri).$suffix;
		}
		else
		{
			return $this->slash_item($this->local_url).$this->CI->config->item('index_page').'?local='.$this->local.'&'.$this->_uri_string($uri);
		}	
	
	}

/*	
	public function _fetch_ip_($ip)
	{
		$ip = sprintf("%u",ip2long($ip));

		$ipdatas = @file(APPPATH.'libraries/localization/data/tinycityip.txt');
		$n = count($ipdatas);
		
		$local = '';

		for($i=0; $i<$n; $i++){
			$ips = explode("\t", $ipdatas[$i]); 
			
			if($ip >= sprintf("%u",ip2long($ips[0])) && $ip <= sprintf("%u",ip2long($ips[1]))){
				$local = $ips[2];
				break;
			}	
		}
		unset($ipdatas, $ip, $n, $ips);	
		
		return $local;
	
	}
*/

	protected function _uri_string($uri)
	{
		if ($this->CI->config->item('enable_query_strings') == FALSE)
		{
			if (is_array($uri))
			{
				$uri = implode('/', $uri);
			}
			$uri = trim($uri, '/');
		}
		else
		{
			if (is_array($uri))
			{
				$i = 0;
				$str = '';
				foreach ($uri as $key => $val)
				{
					$prefix = ($i == 0) ? '' : '&';
					$str .= $prefix.$key.'='.$val;
					$i++;
				}
				$uri = $str;
			}
		}
	    return $uri;
	}
	
	function slash_item($item)
	{
		if( trim($item) == '')
		{
			return '';
		}

		return rtrim($item, '/').'/';
	}
	
}