
<script src="<?php echo base_url();?>assets/designs/jsnew/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>assets/designs/jsnew/additional-methods.min.js"></script>

<?php 
if($user_type=="user"):?>
   
 <section id="main-content" class=" ">
                <section class="wrapper" style='margin-top:40px;display:inline-block;width:100%;padding:15px 0 0 15px;'>

              
                    <div class="col-lg-8 col-md-4 col-xs-12 col-sm-12">
					
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Change Password</h2>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                    <div class="col-md-8 col-sm-9 col-xs-10">
  <!--Change Password -->
            <?php echo form_open("auth/change_password",'class="form-signin" id="change_password_form"');?>			
            <?php echo lang('change_password_old_password_label', 'old_password');?>
            <p>
               <?php echo form_input($old_password);?>
            </p>
            <label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label> 
            <p>
               <?php echo form_input($new_password);?>
            </p>
            <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?> 
            <p>
               <?php echo form_input($new_password_confirm);?>
            </p>
            <?php echo form_input($user_id);?>
            <p><?php echo form_submit('submit', lang('change_password_submit_btn'),'class="btn btn-primary exam-histry-btn"');?></p>
            <?php echo form_close();?>
  <!--Change Password -->
   <?php echo $this->session->flashdata('message');?>
   
                                    </div>
                                </div>


                            </div>
                        </section></div>
						

						</section>
						</section>
						

<script type="text/javascript"> 
   (function($,W,D)
   {
      var JQUERY4U = {};
   
      JQUERY4U.UTIL =
      {
          setupFormValidation: function()
          {
              //Additional Methods			
   		$.validator.addMethod("pwdmatch", function(repwd, element) {
   			var pwd=$('#new').val();
   			return (this.optional(element) || repwd==pwd);
   		},"New Password and Confirm New Passwords does not match.");		
   		
   		//form validation rules
              $("#change_password_form").validate({
                  rules: {
                      "old": {
                          required: true
                      },
   				"new": {
                          required: true,
   					rangelength: [8, 20]
                      },                    
   				"new_confirm": {
                          required: true,
   					pwdmatch: true
                      }
                  },
   			
   			messages: {
   				"old": {
                          required: "Please enter your old password."
                      },
   				"new": {
                          required: "Please enter your new password."
                      },                    
   				"new_confirm": {
                          required: "Please enter confirm new password."
                      }
   			},
                  
                  submitHandler: function(form) {
                      form.submit();
                  }
              });
          }
      }
   
      //when the dom has loaded setup form validation rules
      $(D).ready(function($) {
          JQUERY4U.UTIL.setupFormValidation();
      });
   
   })(jQuery, window, document);
   
</script>

<?php else:?>
<!-- Bootstrap -->
<link href="<?php echo base_url();?>assets/designs/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/designs/css/font-awesome.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/designs/css/style.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/designs/font.css" rel="stylesheet">
<div class="col-md-12 padd">
   <div class="bradcome-menu">
      <ul>
         <li><a href="<?php echo base_url().$user_type;?>">Home</a></li>
         <li><img  src="<?php echo base_url();?>assets/designs/images/arrow.png"></li>
         <li><a href="#">  Change Password </a></li>
      </ul>
   </div>
</div>
<div class="row margin">
   <?php echo $this->session->flashdata('message');?>
   <div class="col-md-12">
      <div class="col-md-2">
         <img src="<?php echo base_url();?>assets/uploads/images(200x200)/<?php if($this->session->userdata('image')!='') echo $this->session->userdata('image');else echo 'dflt-user-icn.png';?>"  class="img-responsive thumbnail">
      </div>
      <div class="col-md-9">
         <div class="col-md-4 padd">
            <div class="sectin-hed">
               Change Password
            </div>
         </div>
         <div class="col-md-8">
            <div class="hed-line"> </div>
         </div>
         <div class="col-md-12 padd">
            <!--Change Password -->
            <?php echo form_open("auth/change_password",'class="form-signin" id="change_password_form"');?>			
            <?php echo lang('change_password_old_password_label', 'old_password');?>
            <p>
               <?php echo form_input($old_password);?>
            </p>
            <label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label> 
            <p>
               <?php echo form_input($new_password);?>
            </p>
            <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?> 
            <p>
               <?php echo form_input($new_password_confirm);?>
            </p>
            <?php echo form_input($user_id);?>
            <p><?php echo form_submit('submit', lang('change_password_submit_btn'),'class="btn bg-primary  exam-histry-btn"');?></p>
            <?php echo form_close();?>
            <!--Change Password -->
         </div>
      </div>
   </div>
</div>
<!-- Validations -->

<script type="text/javascript"> 
   (function($,W,D)
   {
      var JQUERY4U = {};
   
      JQUERY4U.UTIL =
      {
          setupFormValidation: function()
          {
              //Additional Methods			
   		$.validator.addMethod("pwdmatch", function(repwd, element) {
   			var pwd=$('#new').val();
   			return (this.optional(element) || repwd==pwd);
   		},"New Password and Confirm New Passwords does not match.");		
   		
   		//form validation rules
              $("#change_password_form").validate({
                  rules: {
                      "old": {
                          required: true
                      },
   				"new": {
                          required: true,
   					rangelength: [8, 20]
                      },                    
   				"new_confirm": {
                          required: true,
   					pwdmatch: true
                      }
                  },
   			
   			messages: {
   				"old": {
                          required: "Please enter your old password."
                      },
   				"new": {
                          required: "Please enter your new password."
                      },                    
   				"new_confirm": {
                          required: "Please enter confirm new password."
                      }
   			},
                  
                  submitHandler: function(form) {
                      form.submit();
                  }
              });
          }
      }
   
      //when the dom has loaded setup form validation rules
      $(D).ready(function($) {
          JQUERY4U.UTIL.setupFormValidation();
      });
   
   })(jQuery, window, document);
   
</script>
<script src="<?php echo base_url();?>assets/designs/js/bootstrap.min.js"></script>
<?php endif;?>

