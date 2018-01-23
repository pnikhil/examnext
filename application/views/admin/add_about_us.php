<!-- Bootstrap --><script src="<?php echo base_url();?>assets/designs/js/jquery.min.js"></script>
<link href="<?php echo base_url();?>assets/designs/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/designs/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/designs/css/style.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/designs/font.css" rel="stylesheet">
<div class="col-md-12 padd">
   <div class="bradcome-menu">
      <ul>
         <li><a href="<?php echo base_url();?>admin">Home</a></li>
         <li><img  src="<?php echo base_url();?>assets/designs/images/arrow.png"></li>
         <li><a href="<?php echo base_url();?>admin/aboutUs"> Dynamic Pages</a></li>
         <li><img  src="<?php echo base_url();?>assets/designs/images/arrow.png"></li>
         <li><a href="#"> <?php echo $operation;?> Page</a></li>
      </ul>
   </div>
</div>
<div class="row">
   <div class="col-md-12">
      <div style="color:#FF0000; font-size:12px; padding-left:10px;"><?php 
         echo $this->session->flashdata('message');
         ?>
      </div>

             <?php 
                  $attributes = array('name' => 'add_about_us', 'id' => 'add_about_us');
                   echo form_open("admin/aboutUs/".$operation,$attributes) ?>
          <div class="col-md-6">
                  <div class="form-group">                    
                     <label>Title</label>    
                     <input type="text" name="title" placeholder="Title" value="<?php 
                        if(isset($aboutus_rec->name))
                        echo $aboutus_rec->name;echo set_value('title');
                        ?>" />   
                     <?php echo form_error('title');?>			  
                  </div>
                  <label>Description</label>
                  <div class="form-group">                    
                     <textarea class="editors" id="editor3" name="description" cols="100" rows="10"><?php if(isset($aboutus_rec->description))
                        echo $aboutus_rec->description; ?></textarea>
					 <?php echo form_error('description');?>
                  </div>
                  <div class="form-group">                    
                     <label>Meta Tag</label>    
                     <textarea rows="2" cols="40" name="meta_tag" placeholder="Meta Tag"><?php if(isset($aboutus_rec->meta_tag))
                        echo $aboutus_rec->meta_tag; ?></textarea>
					<?php echo form_error('meta_tag');?>
					</div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">                    
                     <label>Meta Description</label>    
                     <textarea rows="2" cols="40" name="meta_tag_keywords" placeholder="Meta Description"><?php if(isset($aboutus_rec->meta_description))
                        echo $aboutus_rec->meta_description; ?></textarea>
					<?php echo form_error('meta_tag_keywords');?>
                  </div>
                  <div class="form-group">                    
                     <label>SEO Keywords</label>    
                     <textarea rows="2" cols="40" name="seo_keywords" placeholder="SEO Keywords"><?php if(isset($aboutus_rec->seo_keywords))
                        echo $aboutus_rec->seo_keywords; ?></textarea>
					<?php echo form_error('seo_keywords');?>
                  </div>
                  
                  <div class="form-group">                    
                     <label>Sort Order</label>  
                     <input type="text" name="sort_order" placeholder="Sort Order" value="<?php if(isset($aboutus_rec->sort_order)) echo $aboutus_rec->sort_order;?>"/>
					 <?php echo form_error('sort_order');?>
                  </div>
                  <div class="form-group">                     
                     <label class="control-label">Under Category</label>											
                     <?php 					 
                        $select = array();
                        
                        if(isset($aboutus_rec->parent_id)) {
                        $select = array(								
                        				$aboutus_rec->parent_id		
                        				);					  			
                        }
                         
                         echo form_dropdown('under_category',$category_opts,$select,'class = "chzn-select"');					 
                         
                         ?>   
                  </div>
                  <div class="form-group">                     
                     <label class="control-label">Status</label>											
                     <?php 					 
                        $options = array(						
                        "Active" => "Active",
                        "Inactive" => "Inactive"								
                        						
                        );	
                        
                        $select = array();
                        if(isset($aboutus_rec->status)) {
                        $select = array(								
                        			$aboutus_rec->status		
                        			);					  			
                        }
                        echo form_dropdown('status',$options,$select,'class = "chzn-select"');					 
                        
                        ?>   
                  </div>
                  <div class="form-group">
                     <?php 
                        if($operation == "Add" ) {?>
                     <input type="submit" class="btn btn-primary wnm-user" value="Add" name="submit" />
                     <?php } else { ?>
                     <input type="hidden" value="<?php echo $aboutus_rec->id?>" name="update_rec_id">
                     <input type="submit" class="btn btn-primary wnm-user" value="Update" name="submit" />
                     <?php } ?>    
                  </div>
               </div>
           
              

            <?php echo form_close(); ?>
   </div>
</div>
<!-- Validations --><!-- CK EDITOR -->
<script src="<?php echo base_url();?>assets/designs/ckeditor.js"></script>
<script>
   $(function() {
   	$('.editors').each(function(){
   	
   		CKEDITOR.replace($(this).attr('id'), { 
   	/*
   	 * Ensure that htmlwriter plugin, which is required for this sample, is loaded.
   	 */
   	extraPlugins: 'htmlwriter',
   	
   	/*
   	 * Style sheet for the contents
   	 */
   	contentsCss: 'body {color:#000; background-color#:FFF;}',
   
   	/*
   	 * Simple HTML5 doctype
   	 */
   	docType: '<!DOCTYPE HTML>',
   
   	/*
   	 * Allowed content rules which beside limiting allowed HTML
   	 * will also take care of transforming styles to attributes
   	 * (currently only for img - see transformation rules defined below).
   	 *
   	 * Read more: http://docs.ckeditor.com/#!/guide/dev_advanced_content_filter
   	 */
   	allowedContent:
   		'h1 h2 h3 p pre[align]; ' +
   		'blockquote code kbd samp var del ins cite q b i u strike ul ol li hr table tbody tr td th caption; ' +
   		'img[!src,alt,align,width,height]; font[!face]; font[!family]; font[!color]; font[!size]; font{!background-color}; a[!href]; a[!name]',
   
   	/*
   	 * Core styles.
   	 */
   	coreStyles_bold: { element: 'b' },
   	coreStyles_italic: { element: 'i' },
   	coreStyles_underline: { element: 'u' },
   	coreStyles_strike: { element: 'strike' },
   
   	/*
   	 * Font face.
   	 */
   
   	// Define the way font elements will be applied to the document.
   	// The "font" element will be used.
   	font_style: {
   		element: 'font',
   		attributes: { 'face': '#(family)' }
   	},
   
   	/*
   	 * Font sizes.
   	 */
   	fontSize_sizes: 'xx-small/1;x-small/2;small/3;medium/4;large/5;x-large/6;xx-large/7',
   	fontSize_style: {
   		element: 'font',
   		attributes: { 'size': '#(size)' }
   	},
   
   	/*
   	 * Font colors.
   	 */
   
   	colorButton_foreStyle: {
   		element: 'font',
   		attributes: { 'color': '#(color)' }
   	},
   
   	colorButton_backStyle: {
   		element: 'font',
   		styles: { 'background-color': '#(color)' }
   	},
   
   	/*
   	 * Styles combo.
   	 */
   	stylesSet: [
   		{ name: 'Computer Code', element: 'code' },
   		{ name: 'Keyboard Phrase', element: 'kbd' },
   		{ name: 'Sample Text', element: 'samp' },
   		{ name: 'Variable', element: 'var' },
   		{ name: 'Deleted Text', element: 'del' },
   		{ name: 'Inserted Text', element: 'ins' },
   		{ name: 'Cited Work', element: 'cite' },
   		{ name: 'Inline Quotation', element: 'q' }
   	],
   
   	on: {
   		pluginsLoaded: configureTransformations,
   		loaded: configureHtmlWriter
   	}
   });
   });
   
   
   
   });
   
   /*
    * Add missing content transformations.
    */
   function configureTransformations( evt ) {
   	var editor = evt.editor;
   
   	editor.dataProcessor.htmlFilter.addRules( {
   		attributes: {
   			style: function( value, element ) {
   				// Return #RGB for background and border colors
   				return CKEDITOR.tools.convertRgbToHex( value );
   			}
   		}
   	} );
   
   	// Default automatic content transformations do not yet take care of
   	// align attributes on blocks, so we need to add our own transformation rules.
   	function alignToAttribute( element ) {
   		if ( element.styles[ 'text-align' ] ) {
   			element.attributes.align = element.styles[ 'text-align' ];
   			delete element.styles[ 'text-align' ];
   		}
   	}
   	editor.filter.addTransformations( [
   		[ { element: 'p',	right: alignToAttribute } ],
   		[ { element: 'h1',	right: alignToAttribute } ],
   		[ { element: 'h2',	right: alignToAttribute } ],
   		[ { element: 'h3',	right: alignToAttribute } ],
   		[ { element: 'pre',	right: alignToAttribute } ]
   	] );
   }
   
   /*
    * Adjust the behavior of htmlWriter to make it output HTML like FCKeditor.
    */
   function configureHtmlWriter( evt ) {
   	var editor = evt.editor,
   		dataProcessor = editor.dataProcessor;
   
   	// Out self closing tags the HTML4 way, like <br>.
   	dataProcessor.writer.selfClosingEnd = '>';
   
   	// Make output formatting behave similar to FCKeditor.
   	var dtd = CKEDITOR.dtd;
   	for ( var e in CKEDITOR.tools.extend( {}, dtd.$nonBodyContent, dtd.$block, dtd.$listItem, dtd.$tableContent ) ) {
   		dataProcessor.writer.setRules( e, {
   			indent: true,
   			breakBeforeOpen: true,
   			breakAfterOpen: false,
   			breakBeforeClose: !dtd[ e ][ '#' ],
   			breakAfterClose: true
   		});
   	}
   }
   
</script>
 

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
   			var pwd=$('#password').val();
   			return (this.optional(element) || repwd==pwd);
   		},"Password and Confirm passwords does not match.");
   		
   		$.validator.addMethod("lettersonly",function(a,b){return this.optional(b)||/^[a-z ]+$/i.test(a)},"Please enter valid name.");
   		
   		$.validator.addMethod("alphanumericonly",function(a,b){return this.optional(b)||/^[a-z0-9 ]+$/i.test(a)},"Alphanumerics only please");
   		
   		$.validator.addMethod("phoneNumber", function(uid, element) {
   			return (this.optional(element) || uid.match(/^([0-9]*)$/));
   		},"Please enter a valid number.");
   		
   		$.validator.addMethod("alphanumerichyphen", function(uid, element) {
   			return (this.optional(element) || uid.match(/^([a-zA-Z0-9 -]*)$/));
   		},"Only Alphanumerics and hyphens are allowed.");
   
   		$.validator.addMethod('check_duplicate_email', function (value, element) {
   			var is_valid=false;
   				$.ajax({
   						url: "<?php echo base_url();?>welcome/check_duplicate_email",
   						type: "post",
   						dataType: "html",
   						data:{ emailid:$('#email').val(), <?php echo $this->security->get_csrf_token_name();?>: "<?php echo $this->security->get_csrf_hash();?>"},
   						async:false,
   						success: function(data) {
   						//alert(data);
   						is_valid = data == 'true';
   				}
   		   });
   		   return is_valid;
   		}, "The Email-id you've entered already exists.Please enter other Email-id.");
   		
   		
   		//form validation rules
              $("#user_creation_form").validate({
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
   				email: {
                          required: true,
   					email: true,
   					check_duplicate_email: true
                      },
   				image: {
                          required: true,
						  accept: "jpg|jpeg|png"
                      },
   				password:{
   					required:true,
   					rangelength: [8, 30]
   				},
   				password_confirm:{
   					required:true,
   					pwdmatch: true
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
   				email: {
                          required: "Please enter your email-id."
                      },
   				image: {
                          required: "Please upload your photo.",
						  accept: "Only jpg / jpeg / png images are accepted."
                      },
   				password:{
   					required: "Please enter password."
   				},
   				password_confirm:{
   					required: "Please enter confirm password."
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

