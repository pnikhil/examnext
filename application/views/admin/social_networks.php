<!-- Bootstrap -->
<link href="<?php echo base_url();?>assets/designs/css/bootstrap.css" rel=
   "stylesheet">
<link href=
   "<?php echo base_url();?>assets/designs/css/font-awesome.min.css" rel=
   "stylesheet">
<link href="<?php echo base_url();?>assets/designs/css/style.css" rel=
   "stylesheet">
<link href="<?php echo base_url();?>assets/designs/font.css" rel=
   "stylesheet">
<link href="<?php echo base_url();?>assets/designs/css/editor.css" rel=
   "stylesheet" type="text/css">
<script src=
   "<?php echo base_url();?>assets/designs/js/jquery.min.js"></script>
<script type="text/javascript">
   $(document).ready( function() {
           
        $("#txtEditor").Editor();                    
        
   });
</script>
<script src="<?php echo base_url();?>assets/designs/js/editor.js"></script>
<script src=
   "<?php echo base_url();?>assets/designs/js/bootstrap.min.js"></script>
<title></title>
</head>
<body>
   <div class="col-md-12 padd bradcome-menu">
      <ul>
         <li>
            <a href="<?php echo base_url();?>admin">Home</a>
         </li>
         <li><img src=
            "<?php echo base_url();?>assets/designs/images/arrow.png"></li>
         <li>
            <a href=
               "<?php echo base_url();?>admin/categories">Categories</a>
         </li>
         <li><img src=
            "<?php echo base_url();?>assets/designs/images/arrow.png"></li>
         <li>
            Social Networks
         </li>
      </ul>
   </div>
   <div class="row col-md-8">
      <div style="color:#FF0000; font-size:12px; padding-left:10px;">
         <?php echo validation_errors();
            echo $this->session->flashdata('message');
            ?>
      </div>
      <!-- <form action="<?php //echo base_url();?>admin/addeditCategories"
         id="categories_form" method="post" formenctype="multipart/form-data" name="categories_form"> -->
		 
		 
		 <?php 
		 $attributes = array("name"=>"socialnetworks_form","id"=>"socialnetworks_form");
		 echo form_open('admin/socialNetworks',$attributes);?>
       
			
			<div class="form-group">                    
              <label>Facebook</label>    
               <input type="text" name="facebook" placeholder="http://www.ex.com" 
			   value="<?php if(isset($network_settings->facebook))		
                     echo $network_settings->facebook;?>" />    
               </div>
			   
               <div class="form-group">                    
                  <label>Twitter</label>    
                  <input type="text" name="twitter" placeholder="http://www.ex.com" value="<?php if(isset($network_settings->twitter))		
                     echo $network_settings->twitter;?>" />    
               </div>
			   
              
			   
               <div class="form-group">                    
                  <label>Google Plus</label>    
                  <input type="text" name="google_plus" placeholder="http://www.ex.com" value="<?php if(isset($network_settings->google_plus))		
                     echo $network_settings->google_plus;?>" />    
               </div>
		 
		 
				<div class="form-group">                    
                  <label>Linkedin</label>    
                  <input type="text" name="linkedin" placeholder="http://www.ex.com" value="<?php if(isset($network_settings->linkedin))		
                     echo $network_settings->linkedin;?>" />    
               </div>
			   
				<input type="hidden" value="<?php  if(isset($network_settings->id))
                  echo $network_settings->id;
                  ?>"  name="update_rec_id" />
               <div class="col-md-6 padd"> 
                  <input type="submit" value="Update" name="submit"  class="btn btn-primary wnm-user"/> 
               </div>
      </form>
   </div>
   <!-- Validations -->
   <script src=
      "<?php echo base_url();?>assets/designs/js/jquery.validate.min.js"></script> 
   <script src=
      "<?php echo base_url();?>assets/designs/js/additional-methods.min.js"></script> 
   <script type="text/javascript">
      (function($,W,D)
      {
      var JQUERY4U = {};
      
      JQUERY4U.UTIL =
      {
          setupFormValidation: function()
          {           
              var rule_set;
              if($('#cat').val()!="")
              {
                  rule_set = {
                               required: true,
                              rangelength: [2, 30],
                              check_duplicates_with_not_cond: true
                          };
              }
              else
              {
                  rule_set = {
                               required: true,
                              rangelength: [2, 30],
                              check_duplicates: true
                          };
              }
              
              
              //Additional Methods
              //When adding categories
              $.validator.addMethod('check_duplicates', function (value, element) {
                  var is_valid=false;
                      $.ajax({
                              url: "<?php echo base_url();?>admin/check_duplicates",
                              type: "post",
                              dataType: "html",
                              data:'condition=name'+'&condition_value='+$('#name').val()+'&table=categories&<?php echo $this->security->get_csrf_token_name();?>=<?php echo $this->security->get_csrf_hash();?>',
                              async:false,
                              success: function(data) {
                              //alert(data);
                              is_valid = data == 'true';
                      }
                 });
                 return is_valid;
              }, "The Category you've entered already exists.Please enter other.");
              
              //When updating categories
              $.validator.addMethod('check_duplicates_with_not_cond', function (value, element) {
                  var is_valid=false;
                      $.ajax({
                              url: "<?php echo base_url();?>admin/check_duplicates_with_not_cond",
                              type: "post",
                              dataType: "html",
                              data:'condition=name'+'&condition_value='+$('#name').val()+'&not_condition=catid'+'&not_condition_value='+$('#cat').val()+'&table=categories&<?php echo $this->security->get_csrf_token_name();?>=<?php echo $this->security->get_csrf_hash();?>',
                              async:false,
                              success: function(data) {
                              //alert(data);
                              is_valid = data == 'true';
                      }
                 });
                 return is_valid;
              }, "The Category you've entered already exists.Please enter other.");
              
              
              //form validation rules
              $("#categories_form").validate({
                  rules: {
                      name: rule_set
                  },
                  
                  messages: {
                      name: {
                          required: "Please enter category name."
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
</body>

