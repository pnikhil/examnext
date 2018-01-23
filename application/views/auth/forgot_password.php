<section id="sub-header">
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1 text-center">
			<h3>Take up online exams without hassles</h3>
			
		</div>
	</div><!-- End row -->
</div><!-- End container -->
<div class="divider_top"></div>
</section>

<div class="container-fluid content-bg">
   <div class="spacer"></div>

   <div class="container inner-content padding">
      <div class="col-md-8 col-xs-12">
         <h2 class="inner-hed">Forgot Password</h2>
         <div class="col-md-12 formgro">
            <div id="infoMessage"><?php  echo $message;?></div>
            <?php echo form_open("auth/forgot_password",'class="form-signin" id="forgot_password_form"');?>
            <div class="form-group paddin-cont">
               <label class="col-lg-3 control-label" for="ftname">Email <span style="color:red;">*</span></label>
               <div class="col-lg-9 ">
                  <?php echo form_input($email);?>
               </div>
            </div>
            <div style="margin-left:60px;" class="form-group ">
               <div style="margin-bottom:20px"; class="col-lg-offset-1 col-lg-7 padd">
                  <?php echo form_submit('submit', lang('reset_password_submit_btn'),'class="btn btn-danger butt"');?>
               </div>
            </div>
            </div>
            </form>
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
              $("#forgot_password_form").validate({
                  rules: {
                      "email": {
                          required: true,
   					email: true
                      }
                  },
   			
   			messages: {
   				"email": {
                          required: "Please enter your email-id."
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