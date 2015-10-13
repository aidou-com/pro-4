<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Loader extends CI_Loader {

	public function view($view, $vars = array(), $return = FALSE)
	{

		$CI =& get_instance();

		if (isset($CI->local))
		{
			$file_exists = FALSE;
			$_ci_path = '';

			$_ci_view = $view.'__'.$CI->local['code'];
			$_ci_ext = pathinfo($_ci_view, PATHINFO_EXTENSION);
			$_ci_file = ($_ci_ext === '') ? $_ci_view.'.php' : $_ci_view;

			foreach ($this->_ci_view_paths as $_ci_view_file => $cascade)
			{
				if (file_exists($_ci_view_file.$_ci_file))
				{
					$_ci_path = $_ci_view_file.$_ci_file;
					$file_exists = TRUE;
					break;
				}

				if ( ! $cascade)
				{
					break;
				}
			}

			if ( $file_exists OR  file_exists($_ci_path))
			{
				$view = $_ci_view;
			}
		}

		

		return parent::view($view, $vars, $return);
	}

}
