<script>
   function do_user_photo_div(action)
   {
   	if (action == "show") {
   		$('#user_photo_div').fadeIn();
   		$('html, body').animate({scrollTop: $('#user_photo_div').offset().top}, 2000);
   		$('#user_photo').focus();
   	}
   	else if (action == "hide") {
   		$('#user_photo_div').fadeOut();
   		$('#user_photo').val('');
   	}
   	
   }
   
</script>

<?php if(count($details)) {
   foreach($details as $d) {
   
?>

<section id="main-content" class=" ">
                <section class="wrapper" style='margin-top:40px;display:inline-block;width:100%;padding:15px 0 0 15px;'>
                     <div class="col-lg-10 col-md-12 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Personal Details</h2>
                            </header>
											
				<div class="col-md-3 col-xs-12 col-sm-12"><br /><br />
         <img src="<?php echo base_url();?>assets/uploads/images(200x200)/<?php if($d->image!='') echo $d->image; else echo 'dflt-user-icn.png';?>"  class="img-responsive thumbnail">
        
		 
		<center> <button id="user_change_photo" onclick="do_user_photo_div('show')" class="btn btn-success btn-icon btn-corner bottom15 right15">
                                            <i class="fa fa-pencil-square-o"></i> &nbsp; <span>change photo</span>
                                        </button></center>
      </div>
                            <div class="content-body">
                                <div class="row">
                                    <div class="col-md-8 col-sm-9 col-xs-10">

                                        <form method="post" id="user_profile_form" action="<?php echo base_url();?>user/update_profile" enctype="multipart/form-data">
			
				<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
		<?php echo $this->session->flashdata('message');?>
		<label class="form-label" for="field-1">Name</label>
	<div class="input-group transparent details">
                                            <span class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </span>
                                             <input type="text" name="first_name" value="<?php echo $d->first_name;?>" placeholder="Enter your first name" class="form-control"/>
   </div>
   
   <label class="form-label" for="field-1">Last Name</label>
   	<div class="input-group transparent details">
	

                                            <span class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            <input type="text" name="last_name" value="<?php echo $d->last_name;?>" placeholder="Enter your last name" class="form-control"/>
	</div>
	 <label class="form-label" for="field-1">Email</label>
		<div class="input-group transparent details">
	

                                            <span class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                            <input type="text" name="email" value="<?php echo $d->email;?>" placeholder="Enter your email" class="form-control"/>
	</div>
	
	
	<label class="form-label" for="field-1">Phone</label>
		<div class="input-group transparent details">
	

                                            <span class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                            <input type="text"  name="phone" maxlength="11" value="<?php echo $d->phone;?>" class="form-control"/>
											<input type="hidden" name="user" value="<?php echo $d->id;?>">
	</div>
	
	<label class="form-label" for="field-1">Select Group</label>
		<div class="details">
	
 <?php 
				  
					$sel = "";
					
					if(isset($d->group))
						$sel = $d->group;
				  
				  echo form_dropdown('group',$groups,$sel);?>
	</div>
	<br />
	
	
	<div class="details col-md-12" id="user_photo_div" style="display:none;margin-top:0;padding-left:0;">
                  <div class="col-md-3">
                     <label style="margin-left:-13px"; class="form-label" for="field-1">Upload Photo</label>
                  </div>
                  <div class="col-md-8">
                     <input type="file" name="image" id="user_photo" style="border: medium none; background: none repeat scroll 0% 0% rgb(250, 250, 250) ! important;">
                  </div>
                  <div class="col-md-1">
                     <a id="cancel_user_change_photo" title="Cancel uploading photo." onclick="do_user_photo_div('hide')" class="btn btn-success btn-corner">Cancel</a>
                  </div>
               </div>
<br /><br />
			   
               
			   <br />
               <input type="submit" name="submit" value="Update" class="btn btn-primary btn-corner  exam-histry-btn" />
            </form>

                                    </div>
                                </div>


                            </div>
                        </section></div>
						
						

						</section>
						</section>
<?php } }?>						

<script type="text/javascript"> 
   (function($,W,D)
   {
      var JQUERY4U = {};
   
      JQUERY4U.UTIL =
      {
          setupFormValidation: function()
          {
              //Additional Methods			
   		$.validator.addMethod("lettersonly",function(a,b){return this.optional(b)||/^[a-z ]+$/i.test(a)},"Please enter valid name.");
   					
   		$.validator.addMethod("phoneNumber", function(uid, element) {
   			return (this.optional(element) || uid.match(/^([0-9]*)$/));
   		},"Please enter a valid number.");			
   		
   		//form validation rules
              $("#user_profile_form").validate({
                  rules: {
                      first_name: {
                          required: true,
                          lettersonly: true,
   					rangelength: [3, 30]
                      },
   				last_name: {
                          required: true,
                          lettersonly: true,
   					rangelength: [3, 30]
                      },                    
   				phone: {
                          required: true,
   					phoneNumber: true,
   					rangelength: [10, 11]
                      },
   				image: {
                          required: true,
						  accept: "jpg|jpeg|png"
                      }
                  },
   			
   			messages: {
   				first_name: {
                          required: "Please enter your first name."
                      },
   				last_name: {
                          required: "Please enter your last name."
                      },                    
   				phone: {
                          required: "Please enter your number."
                      },
   				image: {
                          required: "Please upload your photo.",
						  accept: "Only jpg / jpeg / png images are accepted."
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

