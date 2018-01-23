<!DOCTYPE html>
<html class=" ">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
       <meta name="keywords" content="<?php if(isset($site_data->site_keywords)) echo $site_data->site_keywords; else echo ""; ?>">
      <meta name="description" content="<?php if(isset($site_data->site_description)) echo $site_data->site_description; else echo ""; ?>">
      <title><?php if(isset($title)) echo $title; if(isset($site_data->site_title)) echo " - ".$site_data->site_title; ?></title>
<link rel="shortcut icon" href="<?php echo base_url();?>img/favicon.ico" type="image/x-icon" /> 
<?php if(isset($site_data->google_analytics)) echo $site_data->google_analytics; ?>

		<script src="<?php echo base_url();?>assets/designs/admin/js/jquery-1.11.2.min.js" type="text/javascript"></script> 
        <!-- CORE CSS FRAMEWORK - START -->
        <link href="<?php echo base_url();?>assets/designs/admin/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="<?php echo base_url();?>assets/designs/admin/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();?>assets/designs/admin/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();?>assets/designs/admin/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
		

        <!-- CORE CSS TEMPLATE - START -->
        <link href="<?php echo base_url();?>assets/designs/admin/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();?>assets/designs/admin/css/responsive.css" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS TEMPLATE - END -->

    </head>
	  <!-- END HEAD -->