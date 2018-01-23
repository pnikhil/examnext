<!DOCTYPE html>
<html lang="en">
   <head>
  	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="keywords" content="<?php if(isset($site_data->site_keywords)) echo $site_data->site_keywords; else echo ""; ?>">
      <meta name="description" content="<?php if(isset($site_data->site_description)) echo $site_data->site_description; else echo ""; ?>">
	  <title><?php echo $site_data->site_title; ?></title>
    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
	

	<link href="<?php echo base_url();?>assets/designs/cssnew/settings.css" media="screen" rel="stylesheet">
<link href="<?php echo base_url();?>assets/designs/css/font-awesome.min.css" rel="stylesheet">
   <link href="<?php echo base_url();?>assets/designs/css/front-style.css" rel="stylesheet">
    <!-- CSS -->
    <link href="<?php echo base_url();?>assets/designs/cssnew/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/designs/cssnew/superfish.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/designs/cssnew/style-new.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/designs/fontello/css/fontello.css" rel="stylesheet">
    <!-- color scheme css -->
    <link href="<?php echo base_url();?>assets/designs/cssnew/color_scheme.css" rel="stylesheet">

      <?php if(isset($site_data->google_analytics)) echo $site_data->google_analytics; ?>
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
	  
 </head>
  
  <body>
  <header>
  	<div class="container">
	<div class="row">
		<div class="col-md-3 col-sm-3 col-xs-3">
			<a href="<?php echo base_url();?>" id="logo">Learn</a>
		</div>
		
                  
            
		<div class="col-md-9 col-sm-9 col-xs-9">
		<div align="right"><h3><?php $this->load->library('ion_auth'); if ($this->ion_auth->logged_in()) echo "Hello ".$this->session->userdata('username')."!"; else echo "Hello Guest User!";?></h3></div>
         <?php if ($this->ion_auth->logged_in()): ?>
         		<div class=" pull-right"><a href="<?php echo base_url();?>admin/dashboard";  class="button_top" id="login_top">My Dashboard</a>
			<a href="<?php echo base_url();?>auth/logout" class="button_top hidden-xs" id="apply">Log Out</a></div>
<?php else: ?> <div class=" pull-right"><a href="<?php echo base_url();?>auth/login" class="button_top" id="login_top">Sign in</a> <a href="<?php echo base_url();?>auth/create_user" class="button_top hidden-xs" id="apply">Register</a></div>
            		
      <?php endif; ?>     
		</div>
	</div>
</div>
</header>
<nav>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div id="mobnav-btn"></div>
			<ul class="sf-menu">
				<li><a href="<?php echo base_url();?>">Home</a></li>
				<li class="<?php if(isset($active_menu) && $active_menu=="cats") echo "active";?>"><a href="<?php echo base_url();?>welcome/categories">Categories</a></li> 
				<li><a href="<?php echo base_url(); ?>welcome/aboutus">About Us</a></li>
				<li><a href="<?php echo base_url(); ?>welcome/contact">Contact Us</a></li>                
				
                           <?php $this->load->library('ion_auth');		
                              if ($this->ion_auth->logged_in() && !($this->ion_auth->is_admin() || $this->ion_auth->is_moderator()))
                              {
                              ?>
                           <li class="normal_drop_down">
                              <a href="<?php echo base_url();?>user" data-toggle="dropdown">Dashboard</a>
                              <div class="mobnav-subarrow"></div>
							  <ul>
                                 <li><a href="<?php echo base_url();?>user">My Dashboard</a></li>
                                 <li><a href="<?php echo base_url();?>user/profile">Profile</a></li>
                                 <li><a href="<?php echo base_url();?>user/quiz_history">Quiz History</a></li>
                                 <li><a href="<?php echo base_url();?>auth/logout">Logout</a></li>
                              </ul>
                           </li>
                            <?php } else if ($this->ion_auth->logged_in() && ($this->ion_auth->is_admin() || $this->ion_auth->is_moderator())) { ?>
                           <li class="normal_drop_down">
                              <a href="<?php echo base_url();?>user" data-toggle="dropdown">Dashboard</a>
                              <div class="mobnav-subarrow"></div>
							  <ul>
                                 <li><a href="<?php echo base_url();?>admin">My Dashboard</a></li>
                                 <li><a href="<?php echo base_url();?>auth/logout">Logout</a></li>
                              </ul>
                           </li>
                           <?php } ?>
			</ul>
              
		</div>
	</div><!-- End row -->
</div><!-- End container -->
</nav>