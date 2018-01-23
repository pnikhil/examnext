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
            <a href=
               "#"><?php if(count($data)>0) echo "Update Category"; else echo "Add Category";?></a>
         </li>
      </ul>
   </div>
   <div class="row col-md-8">
      <div style="color:#FF0000; font-size:12px; padding-left:10px;">
         <?php echo validation_errors();
            echo $this->session->flashdata('message');
            ?>
      </div>
      <?php 
		 $attributes = array("name"=>"categories_form","id"=>"categories_form");
		 echo form_open_multipart('admin/addeditCategories',$attributes);?>
         <?php if(count($data)>0)
            $data=$data[0];
            ?>
			
			<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
			
         <div class="form-group">
            <label for="inputEmail">Category Name</label> <?php 
               $val = '';
                   if(( $this->input->post( 'name' )))
                   {
                   $val = $this->input->post( 'name' );
                   }
                   elseif(count($data))
                   {
                       $val = $data->name;
                   }
               
               ?> <input class="form-control" id="name" name=
               "name" placeholder="Enter Category Name" type="text" value=
               "<?php echo $val;?>">
         </div>
         <div class="form-group">
            <label for="inputEmail">Status</label> <?php 
               $val = '';
                   if ( $this->input->post('status') ) {
               $val = $this->input->post( 'status' );
                   }
                   elseif (count($data)) {
                       $val = $data->status;
                   }
               
               echo form_dropdown('status', $element, $val,'class="form-control"');
               ?>
         </div>
		 <div class="form-group">
            <label for="inputEmail">Photo</label> 
			<input type="file" name="userfile" />
         </div>
         <input id="cat" name="id" type="hidden" value=
            "<?php if(isset($id)) echo $id;?>"> <input class=
            "btn btn-primary wnm-user" type="submit" value="submit">
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

