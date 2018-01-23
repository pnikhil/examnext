<!-- BEGIN BODY -->
    <body class=" "><!-- START TOPBAR -->
        <div class='page-topbar '>
            <div class='logo-area'>
 <a href="<?php echo $hlink;?>"><img src="<?php echo base_url();?>assets/designs/images/<?php if(isset($settings->site_logo))echo $settings->site_logo;?>" width="100%" height="60" ></a> 
            </div>
            <div class='quick-area'>
                	
                <div class='pull-left'>
                    <ul class="info-menu right-links list-inline list-unstyled">
                        <li class="profile">
                            <a href="#" data-toggle="dropdown" class="toggle">
                                <img src="<?php echo base_url();?>assets/uploads/images(50x50)/<?php if($this->session->userdata('image')!='') echo $this->session->userdata('image');else echo 'dflt-user-icn.png';?>" alt="user-image" class="img-circle img-inline">
                                <span><i class="fa fa-angle-double-down"></i></span>
                            </a>
                            <ul class="dropdown-menu profile animated fadeIn">
                                
                                <li>
                                    <a href="<?php if(isset($page) && $page == "exam_page") echo "#"; else { ?><?php echo base_url();?>user/profile<?php } ?>">
                                        <i class="fa fa-user"></i>
                                        Profile
                                    </a>
                                </li>
                               
                                <li>
                                    <a href="<?php if(isset($page) && $page == "exam_page") echo "#"; else { ?><?php echo base_url();?>user/logout<?php } ?>">
                                        <i class="fa fa-lock"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
			<div class='pull-right'></div>	
				</ul>			
              	
            </div>

        </div>
        <!-- END TOPBAR -->
        <!-- START CONTAINER -->
        <div class="page-container row-fluid">

            <!-- SIDEBAR - START -->
            <div class="page-sidebar ">


                <!-- MAIN MENU - START -->
                <div class="page-sidebar-wrapper" id="main-menu-wrapper"> 

                    <!-- USER INFO - START -->
                    <div class="profile-info row">

                        <div class="profile-image col-md-4 col-sm-2 col-xs-2">
                            <a href="ui-profile.html">
                                <img src="<?php echo base_url();?>assets/uploads/images(200x200)/<?php if($this->session->userdata('image')!='') echo $this->session->userdata('image');else echo 'dflt-user-icn.png';?>" class="img-responsive img-circle">
                            </a>
                        </div>

                        <div class="profile-details col-md-8 col-sm-8 col-xs-8">

                            <h3>
                                <a href="ui-profile.html"><?php echo $this->session->userdata('username');?></a>

                            </h3>

                            <p class="profile-title"><?php echo $this->session->userdata('email');?></p>

                        </div>

                    </div>
                



                    <ul class='wraplist'  style="height:1000px";>	

						<li> 
                            <a href="<?php if(isset($page) && $page == "exam_page") echo "#"; else { ?><?php echo base_url();?><?php } ?>">
                                <i class="fa fa-home"></i>
                                <span class="title">Home</span>
                            </a>
                        </li>
                        <li class="<?php if(isset($active_menu) && $active_menu=="dashboard") echo "open";?>"> 
                            <a href="<?php if(isset($page) && $page == "exam_page") echo "#"; else { ?><?php echo base_url();?>user<?php } ?>">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>

						<li class="<?php if(isset($active_menu) && $active_menu=="categories") echo "open";?>"> 
                            <a href="<?php if(isset($page) && $page == "exam_page") echo "#"; else { ?><?php echo base_url();?>welcome/categories<?php } ?>">
                                <i class="fa fa-th"></i>
                                <span class="title">Categories</span>
                            </a>
                        </li>
						<li class="<?php if(isset($active_menu) && $active_menu=="payment_history") echo "open";?>"> 
                            <a href="<?php if(isset($page) && $page == "exam_page") echo "#"; else { ?><?php echo base_url();?>user/payment_history<?php } ?>">
                                <i class="fa fa-rupee"></i>
                                <span class="title">Payment History</span>
                            </a>
                        </li>
						<li class="<?php if(isset($active_menu) && $active_menu=="quiz_history") echo "open";?>"> 
                            <a href="<?php if(isset($page) && $page == "exam_page") echo "#"; else { ?><?php echo base_url();?>user/quiz_history<?php } ?>">
                                <i class="fa fa-history"></i>
                                <span class="title">Quiz History</span>
                            </a>
                        </li><li class="<?php if(isset($active_menu) && $active_menu=="profile") echo "open";?>"> 
                            <a href="<?php if(isset($page) && $page == "exam_page") echo "#"; else { ?><?php echo base_url();?>user/profile<?php } ?>">
                                <i class="fa fa-user"></i>
                                <span class="title">My Profile</span>
                            </a>
                        </li>
						<li class="<?php if(isset($active_menu) && $active_menu=="change_password") echo "open";?>"> 
                            <a href="<?php if(isset($page) && $page == "exam_page") echo "#"; else { ?><?php echo base_url();?>auth/change_password<?php } ?>">
                                <i class="fa fa-unlock-alt"></i>
                                <span class="title">Change Password</span>
                            </a>
                        </li>
		
                       
                    </ul>
					<div class="clearfix"></div>

                </div>
            </div>
			</div>
			</div>