<section id="sub-header">
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1 text-center">
			<h1>KNOW ABOUT US</h1>
			
		</div>
	</div><!-- End row -->
</div><!-- End container -->
<div class="divider_top"></div>
</section><!-- End sub-header -->

<section id="main_content">
<div class="container">


	 <div class="row">
	 <p>
            <?php if (isset($aboutus_content) && count($aboutus_content) > 0) { 
               foreach ($aboutus_content as $c) {
				echo $c->content;
            ?> 
            <?php } 
			} 
			else echo "Coming Soon.";
			?>
         </p>
         </div>
        
</div><!-- End container -->
</section><!-- End main_content-->