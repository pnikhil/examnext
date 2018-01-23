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
         <h1 class="inner-hed">Reset Password</h1>
         <div class="col-md-12 formgro">
            <div id="infoMessage"><?php  echo $message;?></div>
            <?php echo form_open('auth/reset_password/' . $code,'class="form-signin" id="reset_password_form"');?>
            <div class="form-group paddin-cont">
               <div class="col-md-9 ">
                  <?php echo form_input($new_password);?>
               </div>
            </div>
            <div class="form-group paddin-cont">
               <div class="col-md-9 ">
                  <?php echo form_input($new_password_confirm);?>
               </div>
            </div>
            <div style="margin-left:60px;" class="form-group ">
               <div class="col-lg-offset-1 col-lg-7 padd">
                  <?php echo form_submit('submit', lang('reset_password_submit_btn'),'class="btn btn-danger butt"');?>
               </div>
            </div>
            <?php echo form_input($user_id);?>
            <?php echo form_hidden($csrf); ?>
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
<script src="<?php echo base_url();?>assets/designs/js/additional-methods.min.js"></script>
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
   		},"The New Password field does not match the Confirm New Password field.");
   		
   		
   		//form validation rules
              $("#reset_password_form").validate({
                  rules: {
                      "new": {
                          required: true,
   					rangelength: [8, 30]
                      },
   				"new_confirm": {
                          required: true,
   					pwdmatch: true
                      }
                  },
   			
   			messages: {
   				"new": {
                          required: "Please enter new password."
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