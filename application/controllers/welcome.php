<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller {

/*
| -----------------------------------------------------
| PRODUCT NAME: 	DIGI ONLINE EXAMINITION SYSTEM (DOES)
| -----------------------------------------------------
| AUTHER:			DIGITAL VIDHYA TEAM
| -----------------------------------------------------
| EMAIL:			digitalvidhya4u@gmail.com
| -----------------------------------------------------
| COPYRIGHTS:		RESERVED BY DIGITAL VIDHYA
| -----------------------------------------------------
| WEBSITE:			http://digitalvidhya.com
|                   http://codecanyon.net/user/digitalvidhya      
| -----------------------------------------------------
|
| MODULE: 			General
| -----------------------------------------------------
| This is general module controller file.
| -----------------------------------------------------
*/

	//Load the Parent Constructor in Welcome Class Constructor and inherit all the properties. And Load any libraries in this Constructor.
	function __construct()
    {
        parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
			$settings = $this->db->get('general_settings')->result()[0];
	
		$this->data['settings'] 			= $settings;
    } 
	
	//Home Page (Default Function. If no function is called, this function will be called).
	public function index()
	{
	    $this->data['message'] 			= (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['identity'] 	= array(
				'name' 					=> 'identity',
				'id' 					=> 'identity',
				'class'					=> 'form-control',
				'placeholder'			=> 'User Email',
				'type' 					=> 'text',
				'required'				=> 'true',
				'value' 				=> $this->form_validation->set_value('identity'),
			);
			$this->data['password'] 	= array(
				'name' 					=> 'password',
				'id' 					=> 'password',
				'class' 				=> 'form-control',
				'placeholder' 			=> 'Password',
				'type' 					=> 'password',
				'required' 				=> 'true'
			);
	
		//Latest Quizzes
		$table 							= $this->db->dbprefix('quiz');
		$latest_quizzes 				= $this->base_model->run_query(
		"select quizid,quiztype,name,difficultylevel,deauration,
		startdate,enddate from ".$table." where status='Active' and 
		enddate>='".date('Y-m-d')."' ORDER BY quizid DESC LIMIT 10"
		);
		
		//Notifications
		$table 							= $this->db->dbprefix('notifications');
		$notifications 					= $this->base_model->run_query("select * from "
		.$table." where status = 'Active' and last_date>='"
		.date('Y-m-d')."' ORDER BY nid DESC LIMIT 10"
		);
		
		//Testimonials
		$table 							= $this->db->dbprefix('testimonials');
		$testimonials 					= $this->base_model->run_query("select * from "
		.$table." where status = 'Active' ORDER BY tid DESC"
		);
		
		
		$this->data['latest_quizzes'] 	= $latest_quizzes;
		$this->data['notifications'] 	= $notifications;
		$this->data['testimonials'] 	= $testimonials;
		$this->data['active_menu'] 		= 'home';
		$this->data['title'] 			= 'Welcome';
		$this->data['content'] 			= 'general/index';
		$this->_render_page('temp/template', $this->data);
	}

	//Render Contact Page
	function contact(){
		$this->data['active_menu'] 		= 'contactus';
		$this->data['title']	 		= 'Contact Us';
		$this->data['content'] 			= 'general/contactus';
		$this->db->select('contact_us');
		$rec = $this->db->get('general_settings')->result()[0];
		$this->data['contact'] = $rec;
		$this->_render_page('temp/template', $this->data);
	}
	
	//Send Contact Query to Admin and Send success alert to User in Mail Formats.
	 function contact_request_sent()
    {
        if ($this->input->post()) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules(
            'name', 
            $this->lang->line('contact_form_validation_name_label'), 
            'required|xss_clean'
            );
            $this->form_validation->set_rules(
            'email', 
            $this->lang->line('contact_form_validation_email_label'), 
            'required|valid_email'
            );
            $this->form_validation->set_rules(
            'phone', 
            $this->lang->line('contact_form_validation_phone_label'), 
            'required|xss_clean|integer'
            );
            $this->form_validation->set_rules(
            'address', 
            $this->lang->line('contact_form_validation_address_label'), 
            'trim|required|xss_clean'
            );
            $this->form_validation->set_rules(
            'subject', 
            $this->lang->line('contact_form_validation_subject_label'), 
            'required|xss_clean'
            );
            if ($this->form_validation->run() == true) {

                $name         = $this->input->post('name');
                $email         = $this->input->post('email');
                $phone         = $this->input->post('phone');
                $address     = $this->input->post('address');
                $subject     = $this->input->post('subject');
                $msg         = "";

                if(trim($this->input->post('msg')) != '') {
                    $msg     = "<strong>Message: </strong>".$this->input->post('msg');
                }

                $message = "Hello Admin,<br/><br/> You have received contact query. Here are the details.<br/><strong>Name: </strong>".$name."<br/><strong>Email: </strong>".$email."<br/><strong>Phone: </strong>".$phone."<br/><strong>Address: </strong>".$address."<br/><strong>Subject: </strong>".$subject."<br/>".$msg."<br/><br/><br/>Regards,<br/><a href='".base_url()."'>".$this->config->item('site_settings')->site_title."</a>";


				$from = $email;

				$to = $this->config->item('site_settings')->contact_email;

				$sub = 'Contact Us Query';

				if(sendEmail($from, $to, $sub, $message)) {

                    $this->prepare_flashmessage(
                    'Thanks for your interest in us. One of our team members will contact you shortly.', 
                    '0'
                    );
				} else $this->prepare_flashmessage("Your request not sent.", '1');
                redirect('welcome/contact');
            }
            else {
                $this->prepare_flashmessage(validation_errors(), '1');
                redirect('welcome/contact', 'refresh');
            }
        }
        else {
            redirect('welcome/contact', 'refresh');
        }    
    }
	//Render Aboutus Page.
	function aboutus()
	{
		$aboutus_content 				= $this->base_model->run_query(
		"select * from ".$this->db->dbprefix('aboutus_content').""
		);
		$this->data['aboutus_content'] 	= $aboutus_content;
		$this->data['active_menu'] 		= 'aboutus';
		$this->data['title']	 		= 'About Us';
		$this->data['content'] 			= 'general/aboutus';
		$this->_render_page('temp/template', $this->data);
	}
	
	//Render Terms and Conditions Page.
	function termsConditions()
	{
	    $this->data['content'] 			= 'general/terms_conditions';
	    $this->data['title']	 		= 'Terms and Conditions';
		$this->_render_page('temp/template', $this->data);
	}
	
	//Render List of Notifications 
	function notifications()
	{
		$table 							= 'notifications';
		$condition 						= '';
		if ($this->uri->segment(3)) {
			$notificationId 			= $this->uri->segment(3);
			$condition['nid'] 			= $notificationId;			
		}
		$notifications 					= $this->base_model->fetch_records_from(
		$table, 
		$condition, 
		$select 						= '*', 
		$order_by 						= ''
		);
		$this->data['notifications'] 	= $notifications;
		if ($this->uri->segment(3)) {
			$this->data['notificationTitle'] = $notifications[0]->title;
		}
		$this->data['content'] 			= 'general/notifications';
		$this->data['title']	 		= 'Notifications';
		$this->_render_page('temp/template', $this->data);
	}
	
	//Check Duplicate Email
	function check_duplicate_email()
	{
		if ($this->base_model->check_duplicate(
		'users', 
		'email', 
		$this->input->post('emailid')
		)) {
			echo "false";
		}
		else {
			echo "true";
		}
	}

	//Render Categories Page.
	function categories($param1='', $param2='', $param3='')
	{
		$list = array();
		if($param1=='') {
			$list 				= $this->base_model->run_query(
			"select * from ".$this->db->dbprefix('categories')." where status='Active' "
			);
			$param1 = 0;
		}
		else if($param1!='' && is_numeric($param1)) {
			$list 				= $this->base_model->run_query(
			"select s.*,c.name as category_name from ".$this->db->dbprefix('subcategories')." s, ".$this->db->dbprefix('categories')." c where c.catid=s.catid AND s.catid=$param1 and s.status='Active' "
			);

			$this->data['selected_catName'] = urldecode($param2);
			if(count($list)>0)
			$this->data['selected_catName'] = $list[0]->category_name;
		}

		$this->data['list'] 			= $list;
		$this->data['selected_cat'] 	= $param1;

		$this->data['active_menu'] 		= 'cats';
		$this->data['title']	 		= 'Categories';
		$this->data['content'] 			= 'general/categories';
		$this->_render_page('temp/template', $this->data);
	}


	function quizList($catid = null, $subcatid = null, $selected_catName = null, $selected_subCatName = null)
	{
	
		if(is_numeric($catid) && is_numeric($subcatid)) {
		
			 $quiz_recs = $this->base_model->run_query("select q.*,c.name as category_name, s.name as sub_category_name, (select sum(totalquestion)  from ".$this->db->dbprefix('quizquestions')." qq where qq.quizid=q.quizid ) as total_questions from ".$this->db->dbprefix('quiz')." q, ".$this->db->dbprefix('categories')." c, ".$this->db->dbprefix('subcategories')." s  where c.catid = q.catid AND s.subcatid = q.subcatid AND q.catid=$catid and q.subcatid=$subcatid and q.status='Active'");
			// echo "<pre>"; print_r($quiz_recs); die();
		if(count($quiz_recs) >0) {
				
			
			$this->data['selected_cat'] 		= $catid;
			$this->data['selected_sub_cat'] 	= $subcatid;
			$this->data['selected_catName'] 	= $quiz_recs[0]->category_name;
			$this->data['selected_subCatName'] 	= $quiz_recs[0]->sub_category_name;
			$this->data['quizzes'] 				= $quiz_recs;
			$this->data['title']	 			= 'Quiz List';
			$this->data['content'] 				= 'general/quizlist';
			$this->_render_page('temp/template', $this->data); 
		} else {
			$this->data['selected_cat'] 		= $catid;
			$this->data['selected_sub_cat'] 	= $subcatid;
			$this->data['selected_catName'] 	= urldecode($selected_catName);
			$this->data['selected_subCatName'] 	= urldecode($selected_subCatName);
			$this->data['quizzes'] 				= $quiz_recs;
			$this->data['title']	 			= 'Quiz List';
			$this->data['content'] 				= 'general/quizlist';
			$this->_render_page('temp/template', $this->data); 
			
		}
			 
	}
	
	}
	
	
	public function pages($param = '' , $param1 = '')
	{	
		
		$table_name = "pages";
		$cond = "id";
		$cond_val = $param;
		if(!$this->base_model->check_duplicate($table_name,$cond,$cond_val)){
			redirect('auth','refresh');
		} 
		else {
		
			$this->db->select('*');
			$rec = $this->db->get_where('pages',array('id' => $param))->result()[0];
			
		
			$this->data['title'] = $rec->name;
			$this->data['active_class'] = urldecode($param1);
			$this->data['heading'] = urldecode($param1);
			$this->data['sub_heading'] = urldecode($param1);
			$this->data['meta_keywords'] = $rec->seo_keywords;
			$this->data['meta_description'] = $rec->meta_description;
			$this->data['description'] = $rec->description;
			$this->data['bread_crumb'] = true;
			$this->data['content'] = 'general/pages_info';
			// echo "<pre>"; print_r($this->data); die();
			$this->_render_page('temp/template',$this->data);
			
		}
	
	}
	
 }

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */