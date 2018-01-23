<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Updates extends MY_Controller {



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



	

	function __construct()

    {

        parent::__construct();

		$this->load->library('form_validation');

		$this->load->helper('url');

    } 

	

	//Home Page (Default Function. If no function is called, this function will be called).	
	public function index()

	{
		$this->load->dbforge();
		
		//Alter catgegories table
		$query="CREATE TABLE IF NOT EXISTS `pages` (
`id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(512) NOT NULL,
  `description` text NOT NULL,
  `meta_tag` varchar(512) NOT NULL,
  `meta_description` varchar(512) NOT NULL,
  `seo_keywords` varchar(500) NOT NULL,
  `is_bottom` enum('0','1') NOT NULL DEFAULT '0',
  `sort_order` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";

	$this->db->query($query);
	
	$query = "CREATE TABLE IF NOT EXISTS `social_networks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facebook` varchar(512) NOT NULL,
  `twitter` varchar(512) NOT NULL,
  `linkedin` varchar(512) NOT NULL,
  `google_plus` varchar(512) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
	$this->db->query($query);
	if (!$this->db->field_exists('image', 

		$this->db->dbprefix('categories'))) {

	   		

		$fields = array(

	    'image' => array(

								'type' => 'varchar',

								'constraint' => '512',

								'Default' => ''

							)

							);

		$this->dbforge->add_column($this->db->dbprefix('categories'), $fields);

		 

		 }


		//Alter subcategories table

	if (!$this->db->field_exists('image', 

		$this->db->dbprefix('subcategories'))) {

	   		

		$fields = array(

	    'image' => array(

								'type' => 'varchar',

								'constraint' => '512',

								'Default' => ''

							)

							);

		$this->dbforge->add_column($this->db->dbprefix('subcategories'), $fields);

		 

		 }
		
		//ALTER TABLE general_settings
		if (!$this->db->field_exists('contact_us', 

		$this->db->dbprefix('general_settings'))) {

	   		

		$fields = array(

	    'image' => array(

								'type' => 'varchar',

								'constraint' => '512',

								'Default' => ''

							)

							);

		$this->dbforge->add_column($this->db->dbprefix('general_settings'), $fields);

		 

		 }
		
		//SCRIPT FOR UNICODE SUPPORT START
		$results = $this->base_model->run_query('SHOW TABLES');

		$char_set = 'utf8'; 

		foreach($results as $tables) {

			foreach($tables as $table_name) {

				$query = "ALTER TABLE $table_name CONVERT TO CHARACTER SET $char_set COLLATE utf8_general_ci";

				if($this->db->query($query))

				echo "$table_name table converted sucessfully.. <br>";

			}

		}

		

		$query = "ALTER DATABASE CHARACTER SET $char_set;";  

			if($this->db->query($query))

			print "\nDatabase collation has been updated successfully.\n"; 

			
			$this->prepare_flashmessage(

				'DOESV4 upgraded sucessfully', 

				'0'

				);

				

		redirect('auth/login');
		
	}

	public function update_v3()

	{

	    

		$this->load->dbforge();

		$user_groups = $this->base_model->run_query("select * from ".$this->db->dbprefix('users_groups'));

		$this->db->empty_table($this->db->dbprefix('groups'));

		$data['id']=1;

		$data['name']='superadmin';

		$data['description']='Super Admin';

		$this->base_model->insert_operation($data,$this->db->dbprefix('groups'));

		

		$data['id']=2;

		$data['name']='members';

		$data['description']='Members';

		$this->base_model->insert_operation($data,$this->db->dbprefix('groups'));

		

		$data['id']=3;

		$data['name']='admin';

		$data['description']='Admin';

		$this->base_model->insert_operation($data,$this->db->dbprefix('groups'));

		

		$data['id']=4;

		$data['name']='moderator';

		$data['description']='Moderator';

		$this->base_model->insert_operation($data,$this->db->dbprefix('groups'));

		unset($data);

		foreach($user_groups as $u) {

			$data['id']=$u->id;

			$data['user_id']=$u->user_id;

			$data['group_id']=$u->group_id;

			$this->base_model->insert_operation($data,$this->db->dbprefix('users_groups'));

		}

		

		

		$status=0;

		//Alter quiz table

		if (!$this->db->field_exists('group', $this->db->dbprefix('users'))) {

	   		

			$fields = array(

		    'group' => array(

									'type' => 'int',

									'constraint' => '20',

									'default' => '0',

								)

								);

			$this->dbforge->add_column($this->db->dbprefix('users'), $fields); //users

			}

			else

			$status = 1;

			unset($fields);

			

			if (!$this->db->field_exists('quiz_for',$this->db->dbprefix('quiz'))) {

			$fields = array(

		    'quiz_for' => array(

									'type' => 'int',

									'constraint' => '20',

									'default' => '0',

								)

								);

			$this->dbforge->add_column($this->db->dbprefix('quiz'), $fields); 

		}

		else

		$status = 1;

		

		



		

		unset($fields);

		//Alter quiz table

	if (!$this->db->field_exists('quizzes_for', 

		$this->db->dbprefix('general_settings'))) {

	   		

		$fields = array(

	    'quizzes_for' => array(

								'type' => 'varchar',

								'constraint' => '50'

								

							)

							);

		$this->dbforge->add_column($this->db->dbprefix('general_settings'), $fields);

		 

		 }

		 else

		 $status = 1;

		 

		 unset($fields);

		//Alter quiz table

	if (!$this->db->field_exists('is_performance_report_for', 

		$this->db->dbprefix('general_settings'))) {

	   		

		$fields = array(

	    'is_performance_report_for' => array(

								'type' => 'varchar',

								'constraint' => '50',

								'Default' => 'Allusers'

							)

							);

		$this->dbforge->add_column($this->db->dbprefix('general_settings'), $fields);

		 

		 }

		 else

		 $status = 1;

		 

		 

		//NEW TABLES

		if (! ($this->db->table_exists($this->db->dbprefix('quiz_for')))) {

	   		

		//NEW TABLE COLUMNS

		$fields = array(

                        'id' => array(

                                                 'type' => 'INT',

                                                 'constraint' => 11, 

                                                 'unsigned' => TRUE,

                                                 'auto_increment' => TRUE

                                          ),

                        'quizid' => array(

                                                 'type' => 'INT',

                                                 'constraint' => '11'

                                          ),

                        'groupid' => array(

                                                 'type' =>'int',

                                                 'constraint' => '11'

                                                 

                                          )

                        

                );

            $this->dbforge->add_key('id', TRUE);

            $this->dbforge->add_field($fields);

			$this->dbforge->create_table($this->db->dbprefix('quiz_for'), TRUE);

		 

		 }

		 else

		 $status = 1;

		 

		 //NEW TABLES

		if (!($this->db->table_exists($this->db->dbprefix('group_settings')))) {

	   		

		//NEW TABLE COLUMNS

		$fields = array(

                        'id' => array(

                                                 'type' => 'INT',

                                                 'constraint' => 11, 

                                                 'unsigned' => TRUE,

                                                 'auto_increment' => TRUE

                                          ),

                        'group_name' => array(

                                                 'type' => 'VARCHAR',

                                                 'constraint' => '50'

                                          ),

                        'status' => array(

                                                 'type' =>'VARCHAR',

                                                 'constraint' => '20',

                                                 'default' => 'Active',

                                                 

                                          ),

                       'date_added' => array(

                                                 'type' =>'DATE'

                                                 

                                          ),

                        

                );

            $this->dbforge->add_key('id', TRUE);

            $this->dbforge->add_field($fields);

			$this->dbforge->create_table($this->db->dbprefix('group_settings'), TRUE);

		 

		 }

		 else

		 $status = 1;

		 

		 

		 

    	if($status==0)

		 $this->prepare_flashmessage(

				'Tables upgraded successfully, Please login to continue', 

				'0'

				);

		else 

		$this->prepare_flashmessage(

				'Already tables are updated.., Please login to continue', 

				'1'

				);

				

		redirect('auth/login');

	

	}

	

	

 }



/* End of file updates.php */

/* Location: ./application/controllers/updates.php */