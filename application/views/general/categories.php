<style type="text/css">
body{
    overflow-x:hidden;
}
@media only screen and (max-width:960px){
    body{
        overflow-y:scroll;
    }
}
</style>
<div class="row">

	<?php echo $this->load->view('general/navigation_categories');?>

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
                           
                                <div class="photo">
								 <a href="<?php echo $hlink;?>">
								 <img src="<?php echo $image_path;?>" data-src="holder.js/300x300" alt="...">
                                   
                                    <div class="cat_row"><?php echo "Category: <div class=\"label label-primary\">".$l->name."</div>"; ?></div>
                                </div>
								
                                
                            </div>
                       

                      </div>

                      

                      <?php } } else echo "<h5 class='no_recs'>Sorry, No Records available.</h5>";?>

                      

                        </div>            

            </div>            

        </div>
		
</div>
		</section>

        <div class="clearfix"></div>
		