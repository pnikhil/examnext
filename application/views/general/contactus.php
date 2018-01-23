  <center><h2>Locate Us on the Map</h2></center><section style="border-style:solid;border-width:2px; border-color: grey;"; id="map"></section><!-- end map-->
  <section id="directions">
  	<div class="container">
    	<div class="row">
        <div class="col-md-8 col-md-offset-2">
		
       <form action="http://maps.google.com/maps" method="get" target="_blank">
				<div class="input-group">
					<input type="text" name="saddr" placeholder="Enter your starting point" class="form-control style-2" />
					<input type="hidden" name="daddr" value="St.Marks road, Bangalore "/><!-- Write here your end point -->
					<span class="input-group-btn">
					<button class="btn" type="submit" value="Get directions" style="margin-left:0;">GET DIRECTIONS</button>
					</span>
				</div><!-- /input-group -->
			</form>
          </div>
        </div>
    </div>
  </section>

<section id="main_content" >
<div class="container">
<div class="row">
	<div class="col-md-4">
		<h3>Address</h3>
		<ul id="contact-info">
			<li><i class="icon-home"></i><?php echo $site_data->address; ?></li>
			<li><i class="icon-phone"></i><?php echo $site_data->phone; ?></li>
			<li><i class=" icon-email"></i> <a href="mailto:<?php echo $site_data->contact_email; ?>"><?php echo $site_data->contact_email; ?></a></li>
		</ul>
		<hr>
	 	<h3>Follow us:</h3>
		
		<ul id="follow_us_contacts">
			
			<?php 
			
				$social_networks = $this->db->get('social_networks')->result();
			if(count($social_networks) > 0) {
			
				$social_networks = $social_networks[0];
			
			if(!empty($social_networks->facebook)) {?>
               <a href="<?php echo $social_networks->facebook?>" target="_blank"><i class="fa fa-facebook fa-4x"></i></a>
			<?php } if(!empty($social_networks->twitter)) {?>
               <a href="<?php echo $social_networks->twitter?>" target="_blank"><i class="fa fa-twitter fa-4x"></i></a>
			<?php } if(!empty($social_networks->google_plus)) {?>
               <a href="<?php echo $social_networks->google_plus?>" target="_blank"><i class="fa fa-google-plus fa-4x"></i></a>
			<?php } if(!empty($social_networks->linkedin)) {?>
				<a href="<?php echo $social_networks->linkedin?>" target="_blank"><i class="fa fa-linkedin fa-4x"></i></a>
            <?php } } ?>  
			
	
		</ul>
        <hr>
		
	</div>
	<div class="col-md-8">
		<div class=" box_style_2">
			<span class="tape"></span>
			<div class="row">
				<div class="col-md-12">
					
				
			
         <h2 class="inner-hed">Contact Us</h2><br />
         <div class="col-md-12 formgro">
            <?php echo $this->session->flashdata('message');?>
            <form novalidate id="contact_form" name="myForm1" method="POST" action="<?php echo base_url();?>welcome/contact_request_sent" role="form" class="form-horizontal">
			
			<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
			
               <div class="form-group paddin-cont">
                  <label class="col-lg-3 control-label" for="ftname">Name <span style="color:red;">*</span></label>
                  <div class="col-lg-9 ">
                     <input type="text" placeholder="Name" class="form-control" id="name" name="name">
                  </div>
               </div>
               <div class="form-group paddin-cont">
                  <label class="col-lg-3 control-label" for="emailid">Email <span style="color:red;">*</span></label>
                  <div class="col-lg-9">
                     <input type="text" placeholder="Email" id="email" class="form-control" name="email">
                  </div>
               </div>
               <div class="form-group paddin-cont">
                  <label class="col-lg-3 control-label" for="mob">Phone <span style="color:red;">*</span></label>
                  <div class="col-lg-9">
                     <input type="text" placeholder="Phone" id="phone" class="form-control" name="phone" maxlength="11">
                  </div>
               </div>
               <div class="form-group paddin-cont">
                  <label class="col-lg-3 control-label" for="pcode">Address <span style="color:red;">*</span></label>
                  <div class="col-lg-9">
                     <textarea rows="3" id="address" class="form-control" name="address"  placeholder="Address" ></textarea>
                  </div>
               </div>
               <div class="form-group paddin-cont">
                  <label class="col-lg-3 control-label" for="sub">Subject <span style="color:red;">*</span></label>
                  <div class="col-lg-9">
                     <input type="text" placeholder="Subject" id="subject" class="form-control" name="subject">
                  </div>
               </div>
               <div class="form-group paddin-cont">
                  <label class="col-lg-3 control-label" for="mes">Message</label>
                  <div class="col-lg-9">
                     <textarea rows="3" class="form-control" name="msg" placeholder="Message"></textarea>
                  </div>
               </div>
               <div style="margin-left:60px;" class="form-group ">
                  <div class="col-lg-offset-2 col-lg-10">
                     <input type="submit" value="Submit" name="submit" class="btn btn-danger butt">
                  </div>
               </div>
            </form>
         </div>
		 

      </div>
     
    	
   </div>
	</div>
</div>
 <div class="spacer"></div>
</div>
</section>



<script src="<?php echo base_url();?>assets/designs/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/designs/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>assets/designs/js/additional-methods.min.js"></script>


<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/designs/js/mapmarker.jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/designs/js/mapmarker_func.jquery.js"></script>

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
              $("#contact_form").validate({
                  rules: {
                      name: {
                          required: true,
                          lettersonly: true,
   					rangelength: [3, 30]
                      },
                      email: {
                          required: true,
   					email: true
                      },
   				phone: {
                          required: true,
   					phoneNumber: true,
   					rangelength: [10, 11]
                      },
   				address:{
   					required:true
   				},
   				subject:{
   					required:true
   				}				
                  },
   			
   			messages: {
   				name: {
                          required: "Please enter your name."
                      },
                      email: {
                          required: "Please enter your email-id."
                      },
   				phone: {
                          required: "Please enter your number."
                      },
   				address:{
   					required: "Please enter your address."
   				},
   				subject:{
   					required: "Please enter the purpose of contacting."
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