<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


		$CI =& get_instance();
     	$CI->load->database();

		$site_settings = $CI->db->get('general_settings')->row();
		if(count($site_settings)>0) {
			$CI->config->set_item('site_settings', $site_settings);	
		}

		$emailSettings = $CI->db->get('email_setting')->row();
		if(count($emailSettings)>0) {
			$CI->config->set_item('emailSettings', $emailSettings);	
		}



		$config['use_mongodb'] = FALSE;






/* End of file does.php */

/* Location: ./application/config/does.php */

