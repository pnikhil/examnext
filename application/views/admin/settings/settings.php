<!-- Bootstrap -->
<link href="<?php echo base_url();?>assets/designs/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/designs/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/designs/css/style.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/designs/font.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/designs/css/editor.css" type="text/css" rel="stylesheet"/>
<script src="<?php echo base_url();?>assets/designs/js/jquery.min.js"></script>
<script type="text/javascript">
   $(document).ready( function() {
          $("#txtEditor").Editor();                    
     });
</script>
<script src="<?php echo base_url();?>assets/designs/js/editor.js"></script>
<script src="<?php echo base_url();?>assets/designs/js/bootstrap.min.js"></script>
<div class="col-md-12 padd">
   <div class="bradcome-menu">
      <ul>
         <li><a href="<?php echo base_url();?>admin">Home</a></li>
         <li><img  src="<?php echo base_url();?>assets/designs/images/arrow.png"></li>
         <li><a href="#">Settings</a></li>
      </ul>
   </div>
</div>
<div class="row">
   <div class="col-md-8">
      <div style="color:#FF0000; font-size:12px; padding-left:10px;"><?php echo validation_errors();
         echo $this->session->flashdata('message');
         ?>
      </div>
      <form method="POST" action="<?php echo base_url();?>admin/settings" id="settings_form" enctype="multipart/form-data">
         <?php if(count($data)>0)
            $data=$data[0];
            ?> 

			<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
			
         <div class="form-group">
            <label for="inputEmail">Site Title</label>
            <?php 
               $val = '';
               	if ($this->input->post( 'site_title' )) {
               	$val = $this->input->post( 'site_title' );
               	}
               	elseif (count($data)) {
               		$val = $data->site_title;
               	}
            ?>
            <input type="text" class="form-control" id="site_title" name="site_title" value="<?php echo $val;?>" placeholder="Enter Site Title" >
         </div>
         <div class="form-group">
            <label for="inputEmail">Site Description</label>
            <?php 
               $val = '';
               	if ($this->input->post('site_description')) {
					$val = $this->input->post('site_description');
               	}
               	elseif (count($data)) {
               		$val = $data->site_description;
               	}
               ?>
            <textarea class="form-control" id="site_description" name="site_description" value="<?php echo $val;?>" placeholder="Enter Site Description" ><?php echo $val;?></textarea>
         </div>
         <div class="form-group">
            <label for="inputEmail">Site Keywords</label>
            <?php 
               $val = '';
               	if ($this->input->post('site_keywords')) {
					$val = $this->input->post('site_keywords');
               	}
               	elseif (count($data)) {
               		$val = $data->site_keywords;
               	}
               ?>
            <textarea class="form-control" id="site_keywords" name="site_keywords" value="<?php echo $val;?>" placeholder="Enter Site Keywords" ><?php echo $val;?></textarea>
         </div>
         <div class="form-group">
            <label for="inputEmail">Site URL</label>
            <?php 
               $val = '';
               	if ($this->input->post('site_url')) {
					$val = $this->input->post('site_url');
               	}
               	elseif (count($data)) {
               		$val = $data->site_url;
               	}
               
               ?>
            <input type="text" class="form-control" id="site_url" name="site_url" value="<?php echo $val;?>" placeholder="Enter Site URL" >
         </div>

		 <div class="form-group">           
			 <label>Site Country</label>			
			 <?php 					 
				$country_select = set_value('site_country', (count($data)) ? $data->site_country : '');

				 echo form_dropdown('site_country',$country_options,$country_select,'class = "chzn-select"');?>
		  </div>

		  <div class="form-group">           
			 <label>Site Time-zone</label>			
			 <?php 					 
				$time_zone_options_select = set_value('site_timezone', (count($data)) ? $data->site_timezone : '');

				 echo form_dropdown('site_timezone',$time_zone_options,$time_zone_options_select,'class = "chzn-select"');?>
		  </div>

		 <div class="form-group">
            <label for="inputEmail">Copy right</label>
			
			<?php 
				$val = '';
					if(($this->input->post('copy_right' )))
					{
					$val = $this->input->post('copy_right');
					}
					elseif(count($data))
					{
						$val = $data->copy_right;
					}
	
			?>
						
            <input type="text" class="form-control" id="copy_right" name="copy_right" value="<?php echo $val;?>" placeholder="Enter Copy Right" >
        </div>
		<div class="form-group">
            <label for="inputEmail">Powered By</label>
            <?php 
               $val = '';
               	if ($this->input->post('powered_by')) {
					$val = $this->input->post('powered_by');
               	}
               	elseif (count($data)) {
               		$val = $data->powered_by;
               	}
            ?>
            <input type="text" class="form-control" id="powered_by" name="powered_by" value="<?php echo $val;?>" placeholder="Powered By" >
         </div>
		 <div class="form-group">
            <label for="inputEmail">URL for Powered By</label>
            <?php 
               $val = '';
               	if ($this->input->post('url_for_powered_by')) {
					$val = $this->input->post('url_for_powered_by');
               	}
               	elseif (count($data)) {
               		$val = $data->url_for_powered_by;
               	}
            ?>
            <input type="text" class="form-control" id="url_for_powered_by" name="url_for_powered_by" value="<?php echo $val;?>" placeholder="Enter URL for Powered By" >
         </div>
         <div class="form-group">
            <label for="inputEmail">Site Logo</label>
            <input type="file" id="site_logo" name="site_logo">
         </div>
         <div class="form-group">
            <label for="inputEmail">Address</label>
            <?php 
               $val = '';
               	if ($this->input->post('address')) {
					$val = $this->input->post('address');
               	}
               	elseif (count($data)) {
               		$val = $data->address;
               	}
               
               ?>
            <textarea class="form-control" id="address" name="address" value="<?php echo $val;?>" placeholder="Enter Address" ><?php echo $val;?></textarea>
         </div>
         <div class="form-group">
            <label for="inputEmail">Phone</label>
            <?php 
               $val = '';
               	if ($this->input->post( 'phone' )) {
					$val = $this->input->post('phone');
               	}
               	elseif (count($data)) {
               		$val = $data->phone;
               	}
               ?>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $val;?>" placeholder="Enter Phone Number" >
         </div>

		 <div class="form-group">
            <label for="is_performance_report_for">Is Performance Report For</label>&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="radio"  name="is_performance_report_for"  value="Allusers" <?php if(count($data)) { if($data->is_performance_report_for == "Allusers") echo "checked"; } else echo "checked"; ?> />All Users &nbsp;
			<input type="radio" name="is_performance_report_for" value="Paidusers" <?php if(count($data)) { if($data->is_performance_report_for == "Paidusers") echo "checked"; } ?> />Paid Users
         </div>
		 
		  <div class="form-group">
		
            <label for="is_performance_report_for">Select which Quizzes To Display For User?</label>&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="radio"  name="quizzes_to_display"  value="Allquizzes" <?php if(count($data)) { if($data->quizzes_for == "Allquizzes") echo "checked"; } else echo "checked"; ?> />All Quizzes&nbsp;
			<input type="radio" name="quizzes_to_display"   value="groupquizzes" <?php if(count($data)) { if($data->quizzes_for == "groupquizzes") echo "checked"; } ?> />Quizzes Related To Group 
        
		</div>
		 
		 
         <div class="form-group">
            <label for="inputEmail">Contact Email</label>
            <?php 
               $val = '';
               	if ($this->input->post('contact_email')) {
					$val = $this->input->post('contact_email');
               	}
               	elseif (count($data)) {
               		$val = $data->contact_email;
               	}
            ?>
            <input type="text" class="form-control" id="contact_email" name="contact_email" value="<?php echo $val;?>" placeholder="Enter Contact Email" >
         </div>
         <div class="form-group">
            <label for="inputEmail">Google Analytics</label>
            <?php 
               $val = '';
               	if ($this->input->post('google_analytics')) {
					$val = $this->input->post('google_analytics');
               	}
               	elseif (count($data)) {
               		$val = $data->google_analytics;
               	}
            ?>
            <textarea class="form-control" id="google_analytics" name="google_analytics" placeholder="Type Google Analytics" ><?php echo $val;?></textarea>
         </div>
         <h3>Certificate Settings</h3>
         <div class="form-group">
            <label for="inputEmail">Certificate Logo</label>
            <input type="file" id="certificate_logo" name="certificate_logo">
         </div>
         <div class="form-group">
            <label for="inputEmail">Certificate Content</label>
            <?php 
               $val = '';
               	if ($this->input->post('certificate_content')) {
					$val = $this->input->post( 'certificate_content' );
               	}
               	elseif (count($data)) {
               		$val = $data->certificate_content;
               	}
            ?>
            <textarea class="editors" id="editor1" name="certificate_content" placeholder="Type Content for Certificate" ><?php echo $val;?></textarea>
         </div>
         <div class="form-group">
            <label for="inputEmail">Upload Signature on Certificate</label>
            <input type="file" id="certificate_sign" name="certificate_sign">
         </div>
         <div class="form-group">
            <label for="inputEmail">Text for Signature</label>
            <?php 
               $val = '';
               	if ($this->input->post('certificate_sign_text')) {
					$val = $this->input->post( 'certificate_sign_text' );
               	}
               	elseif (count($data)) {
               		$val = $data->certificate_sign_text;
               	}
            ?>
            <textarea class="editors" id="editor2" name="certificate_sign_text" placeholder="Type Text for Signature"><?php echo $val;?></textarea>
         </div>
		 <div class="form-group">
		  <label for="inputEmail">Contact Us</label><br/>
		 <textarea rows="2" cols="40" name="contact_us" ><?php if(isset($data->contact_us))echo $data->contact_us;?></textarea>
		 </div>
         <input type="hidden" name="id" value="<?php if(isset($id)) echo $id;?>">
         <button type="submit" class="btn btn-primary wnm-user">Update</button>
      </form>
   </div>
</div>
<!-- CK EDITOR -->
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
<!-- Validations -->
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
              $("#settings_form").validate({
                  
   			ignore: "", //To validate hidden fields
   			rules: {
                      site_title: {
   					required: true,
   					rangelength: [5, 100]
   				},
   				site_description: {
   					required: true
   				},
   				site_keywords: {
   					required: true
   				},
   				site_url: {
   					required: true,
   					url: true
   				},
   				address: {
   					required: true
   				},
   				phone: {
   					required: true,
   					digits: true,
   					rangelength: [10,11]
   				},
   				contact_email: {
   					required: true,
   					email: true
   				},
				url_for_powered_by: {
   					url: true
   				},
				site_logo: {
				
					accept: "jpg|jpeg|png"
				
				},
				certificate_logo: {
				
					accept: "jpg|jpeg|png"
				
				},
				certificate_sign: {
				
					accept: "jpg|jpeg|png"
				
				},
   				certificate_content: {
   					required: true
   				},
   				certificate_sign_text: {
   					required: true
   				}
   				
                  },
   			
   			messages: {
   				site_title: {
   					required: "Please enter title of website."
   				},
   				site_description: {
   					required: "Please enter description for website."
   				},
   				site_keywords: {
   					required: "Please enter site keywords."
   				},
   				site_url: {
   					required: "Please enter site URL."
   				},
   				address: {
   					required: "Please enter address that is to be appear in contact page."
   				},
   				phone: {
   					required: "Please enter contact number."
   				},
   				contact_email: {
   					required: "Please enter contact email."
   				},
				url_for_powered_by: {
   					url: "Please enter a valid URL for Powered By."
   				},
				site_logo: {

					accept: "Only jpg / jpeg / png images are accepted."

				},
				certificate_logo: {
				
					accept: "Only jpg / jpeg / png images are accepted."
				
				},
				certificate_sign: {
				
					accept: "Only jpg / jpeg / png file formats are accepted."
				
				},
   				certificate_content: {
   					required: "Please enter content for certificate."
   				},
   				certificate_sign_text: {
   					required: "Please enter text that is to be appear under the uploaded signature."
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

