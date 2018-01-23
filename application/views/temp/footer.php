<footer>
<hr>

<div class="container" id="nav-footer">
	<div class="row text-left">
		<div class="col-md-3 col-sm-3">
			<h4>Browse</h4>
			<ul>
				<li><a href="prices_plans.html">Prices</a></li>
				<li><a href="courses_grid.html">Courses</a></li>
				<li><a href="blog.html">Blog</a></li>
				<li><a href="contacts.html">Contacts</a></li>
			</ul>
		</div><!-- End col-md-4 -->
		<div class="col-md-3 col-sm-3">
			<h4>Next Courses</h4>
			<ul>
				<li><a href="course_details_1.html">Biology</a></li>
				<li><a href="course_details_2.html">Management</a></li>
				<li><a href="course_details_2.html">History</a></li>
				<li><a href="course_details_3.html">Litterature</a></li>
			</ul>
		</div><!-- End col-md-4 -->
		<div class="col-md-3 col-sm-3">
			<h4>About Learn</h4>
			<ul>
				<li><a href="about_us.html">About Us</a></li>
				<li><a href="apply_2.html">Apply</a></li>
				<li><a href="#">Terms and conditions</a></li>
				<li><a href="register.html">Register</a></li>
			</ul>
		</div><!-- End col-md-4 -->
		<div class="col-md-3 col-sm-3">
			<ul id="follow_us">
				<li><a href="#"><i class="icon-facebook"></i></a></li>
				<li><a href="#"><i class="icon-twitter"></i></a></li>
				<li><a href="#"><i class=" icon-google"></i></a></li>
			</ul>
			<ul>
				<li><strong class="phone"><?php echo $site_data->phone; ?></strong><br><small>Mon - Fri / 9.00AM - 06.00PM</small></li>
				<li>Questions? <a href="mailto:<?php echo $site_data->contact_email; ?>"><?php echo $site_data->contact_email; ?></a></li>
			</ul>
		</div><!-- End col-md-4 -->
	</div><!-- End row -->
</div>
<div id="copy_right"><center>&copy;<?php echo " ".date("Y")." ".$site_data->copy_right;?></center>
<?php if(isset($site_data->powered_by)) { ?>
         <span> Powered By : <a href="<?php if(isset($site_data->url_for_powered_by)) echo $site_data->url_for_powered_by; else echo "#";?>" target="_blank"><span style="color:#D3D3D3";><?php echo $site_data->powered_by;?></span>
		 </a></span></div>
		 <?php } ?>
</footer>

<div id="toTop">Back to top</div>
<script src="<?php echo base_url();?>assets/designs/js/jquery.min.js"></script>

<!-- OTHER JS --> 
<script src="<?php echo base_url();?>assets/designs/jsnew/superfish.js"></script>
<script src="<?php echo base_url();?>assets/designs/jsnew/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/designs/jsnew/retina.min.js"></script>
<script src="<?php echo base_url();?>assets/designs/validate.js"></script>
<script src="<?php echo base_url();?>assets/designs/jsnew/jquery.placeholder.js"></script>
<script src="<?php echo base_url();?>assets/designs/jsnew/functions.js"></script>
<script src="<?php echo base_url();?>assets/designs/jsnew/classie.js"></script>
<script src="<?php echo base_url();?>assets/designs/jsnew/uisearch.js"></script>



<script src="<?php echo base_url();?>assets/designs/js/html5placeholder.jquery.js"></script>

	
<script>new UISearch( document.getElementById( 'sb-search' ) );</script>