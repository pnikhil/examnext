<section id="sub-header">
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1 text-center">
			<h3>Take up online exams without hassles</h3>
			
		</div>
	</div><!-- End row -->
</div><!-- End container -->
<div class="divider_top"></div>
</section><!-- End sub-header -->
<!-- Slider-->
<!-- Middle Content-->
<div class="container-fluid content-bg">
   <div class="spacer"></div>
   <div class="container padding">
      
   </div>
   <div class="container inner-content padding">
      <div class="col-md-8 col-xs-12">
         <h2 class="form-hed">SIGN <span class="block"> IN</span></h2>
         <div class="col-md-12 formgro">
            <!--  <div id="infoMessage"><?php  echo $message;?></div>	-->
            <?php echo $this->session->flashdata('message'); ?>
            <?php echo form_open("auth/login",'class="form-signin" id="login_form"');?>
            <div class="form-group paddin-cont">
               <label class="col-lg-3 control-label" for="ftname">User Email<span style="color:red;">*</span></label>
               <div class="col-lg-9 ">
                  <?php echo form_input($identity);?>
               </div>
            </div>
            <div class="form-group paddin-cont">
               <label class="col-lg-3 control-label" for="ftname">Password<span style="color:red;">*</span></label>
               <div class="col-lg-9 ">
                  <?php echo form_input($password);?>
               </div>
            </div>
            <div class="form-group ">
               <div class="col-md-3"></div><div class="col-lg-3">
                  <?php echo form_submit('submit', $this->lang->line('login_submit_btn'),'class="btn btn-primary butt"');?>
				  <a class="btn btn-primary but" href="<?php echo base_url(); ?>auth/create_user"> <?php echo lang('signup_user_submit_btn'); ?></a>
				   <br /><br /><a class="btn btn-danger" href="<?php echo base_url(); ?>auth/forgot_password"><?php echo lang('login_forgot_password'); ?></a></center>
               </div>
			  </div>
            </div>
            <?php echo form_close();?>
            <div class="text-center">
               <ul class="list-inline">
                  <li></li>
                  
               </ul>
            </div>
         </div>
      </div>
   </div>
   <div class="spacer"></div>
</div>
</div>
<!-- Middle Content-->
<!-- Validations -->
<script src="<?php echo base_url();?>assets/designs/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/designs/js/jquery.validate.min.js"></script>
<script type="text/javascript"> 
   (function($,W,D)
   {
      var JQUERY4U = {};
   
      JQUERY4U.UTIL =
      {
          setupFormValidation: function()
          {
              //form validation rules
              $("#login_form").validate({
                  rules: {
   				identity: {
                          required: true,
   					email: true
                      },
   				password:{
   					required:true
   				}
                  },
   			
   			messages: {
   				identity: {
                          required: "Please enter your email-id."
                      },
   				password:{
   					required: "Please enter password."
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