            <section id="main-content" class=" ">
                <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>
				
				<?php 
   $message = $this->session->flashdata('message');
   if(isset($message)) echo $message;?>

                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">CATEGORIES</h1>  </div>


                        </div>
                    </div>
                    <div class="clearfix"></div>
					
					<div class="col-lg-12">
                        <section>
                           
                            <div>    <div class="row">

                            <div class="col-sm-6 col-lg-3">
                            <a class="block block-rounded block-link-hover3 text-center" href="<?php echo base_url();?>">
                                <div class="block-content block-content-full bg-success">
                                  <i style="font-size:40px"; class="fa fa-home icon-xlg icon-rounded icon-success"></i>
                                   
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-white text-white">
                                    <h4>HOME</h4>
                                </div>
                            </a>
                        </div>
						 
						
						


                                </div>
                            </div>
                        </section></div>
						
						<div class="col-xs-10 col-sm-10 col-lg-10">

            

                        <div class="row title-row">



            <div class="col-xs-12">

          <?php if(isset($selected_cat) && $selected_cat != 0) echo "<button style=\"margin-top:10px\"; type=\"button\" onclick=\"window.history.back()\" class=\"button_medium_outline\"><b>Go Back</b></button>";	?>	
            

            <h3 class="heade-title">

			<?php $page_heading = "All Categories";
		
			if(isset($selected_cat) && $selected_cat != 0) $page_heading = "Sub-categories in the Category '".$selected_catName."'";
			echo $page_heading;

			?>	

			</h3>
		</div>
	</div>

            <div class="row">

            

             <?php if(count($list) > 0) { foreach($list as $l) { 

             $image_path = base_url()."images/noimage.jpg";

             if(isset($l->image) && $l->image!='')

             $image_path = $l->image;

			 

			 $hlink = base_url()."welcome/categories/".$l->catid."/".$l->name;

			 if(isset($selected_cat) && $selected_cat != 0)

				$hlink = base_url()."welcome/quizList/".$selected_cat."/".$l->subcatid."/".$selected_catName."/".$l->name;

              ?>

                        <div class="col-lg-3 col-md-6">

						 
                            <div class="col-item">
                           
                                
								 <a href="<?php echo $hlink;?>">
								 <img src="<?php echo $image_path;?>" data-src="holder.js/300x300" alt="...">
                                   
                                    <div class="cat_row"><?php echo "Category: <div class=\"label label-primary\">".$l->name."</div>"; ?></div>
                                
								
                                
                            </div>
                       

                      </div>

                      

                      <?php } } else echo "<h5 class='no_recs'>Sorry, No Records available.</h5>";?>

                      

                        </div>            

            </div> 
						
						</section>
			</section>
 </div>
