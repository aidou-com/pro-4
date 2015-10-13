<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// ·¢ËÍ¶ÌÐÅÀà

class sms
{

	function __construct()
	{
		$this->ci =& get_instance();
	}
		
	function send($msg,$numbers)
	{
		require_once APPPATH.'libraries/soap/nusoap.php';
		
		$client = new nusoap_client('http://www.jianzhou.sh.cn:8080/JianzhouSMSWSServer/wsdl/BusinessService.wsdl', true);
		
		
		$client->soap_defencoding = 'utf-8';
		$client->decode_utf8      = false;
		$client->xml_encoding     = 'utf-8';
		
		$string = $msg;

		$params = array(
			'account' => 'shangli',
			'password' => 'onlyonly',
			'destmobile' => $numbers,
			'msgText'	=> $string,
		);

		$result = $client->call('sendBatchMessage', $params, 'http://www.jianzhou.sh.cn:8080/JianzhouSMSWSServer/services/BusinessService');

		


	}
	
}