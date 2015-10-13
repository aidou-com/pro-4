<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		

	}

	public function index()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('mobile', '手机号码', 'required');

		if ( $this->form_validation->run() == FALSE)
		{
		
			$data = array();
			$this->load->view('coupon/index', $data);
		}
		else
		{
		
			
		
			$this->load->model('order/coupon_model');
			
			$time_mobile = time() - 86400*3;
			$time_ip = time()- 86400;
			
	
			// 每天只充许发送短信的总数量
			$where = array('sendtime >' => $time_ip);
			
			$list_count = $this->coupon_model->get_smscoupon_list_count( NULL, $where);	
			
			if ($list_count < 200)
			{
		
				// 三天之内同一个手机只能发送一次优惠信息
				$where = array('mobile' => $this->input->post('mobile'), 'sendtime >' => $time_mobile);
				
				$list_count = $this->coupon_model->get_smscoupon_list_count( NULL, $where);
				
				if ($list_count > 0)
				{	
					$data['msg'] = '您已经领取了我们的手机优惠券';
				}
				else
				{
					
					// 一天之内同一个IP只能发送一次优惠信息
					$where = array('sendip' => $this->input->ip_address(), 'sendtime >' => $time_ip);			
					$list_count = $this->coupon_model->get_smscoupon_list_count( NULL, $where);
					
					if ($list_count > 0)
					{
						$data['msg'] = '您已经领取了我们的手机优惠券';
					}
					else
					{
						$data['msg'] = '恭喜您,领取了我们的手机优惠券';
					
						$db_data = array(
								'mobile' => $this->input->post('mobile'),
								'base' => 0,
								'area' => $this->input->post('area'),
								'sendtime' => time(),
								'sendip' => $this->input->ip_address()
								);

						if ( ! strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger')) 
						{
							$db_data['cnname'] =$this->input->post('cnname');
						}
						else
						{
							$db_data['cnname'] =$this->input->post('cnname').'/w' ;
						}
						$course = $this->input->post('course');
						if (! empty($course))
						{
							$db_data['cnname'] .=$course;
						}
						$smscouponid = $this->coupon_model->create_smscoupon($db_data);
						
						
						
						if ($smscouponid > 0)
						{
							$data['msg'] = '亲爱的'.$this->input->post('cnname').':<br><br>恭喜您,领取了我们的手机优惠券';
					//		$this->load->library('sms');
							$exdate = date('Y-n-j', time() + 86400*15); 
					
							$sms_msg = '凭本短信到上海交大昂立新日语报名可享受50元优惠，有效期至:'.$exdate.' www.onlyjp.cn【昂立日语】';
							
					//		$this->sms->send($sms_msg, $this->input->post('mobile'));
						}
						
						
					
					}
				
				
				}

			}
			else
			{
				$data['msg'] = '您好，今天的短信优惠券已全部领空，有疑问或建议请联系:021-64485268';
				
			}
			
			$this->load->view('app/app_submit', $data);
		
		}
		
	}

}