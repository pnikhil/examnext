<style>

.exam-list {
    padding: 15px;
}

body{
    overflow-x:hidden;
}
@media only screen and (max-width:960px){
    body{
        overflow-y:scroll;
    }
}

</style>
<div class="row new-div">

	<?php echo $this->load->view('general/navigation_categories');?>

        <div class="col-xs-12 col-sm-12 col-lg-4">



                        <div class="row title-row">



            <div class="col-xs-12">


            <h3 class="heade-title">

			<?php echo "Quizzes in ".$selected_catName." > ".$selected_subCatName;	?>	
			</h3>
            <?php echo "<button style=\"margin-top:10px\"; type=\"button\" onclick=\"window.history.back()\" class=\"button_medium_outline\"><b>Go Back</b></button>";	?>	
            </div>

            	
			

            </div>

            <div class="row">

            <div class="exam-list">

             <?php 
             if(count($quizzes)>0) {
			// echo "<pre>"; print_r($quizzes); die();
             foreach($quizzes as $q) {

			 

			 $hlink = base_url()."user/instructions/".$q->quizid;

				

              ?>

 <div class="box-sty">
 <div class="box-sty-name"> 
<?php echo "Name of Quiz: ".strtoupper($q->name);?></a>
</div>
<div class="col-md-4"><time> <i class="fa fa-clock-o"></i> <?php echo $q->deauration." Minutes"; ?><br /></time></div>
<div class="col-md-4"><question> <i class="fa fa-question"></i> <?php echo " ".$q->total_questions." Questions"; ?></question></div>
<div class="col-md-4"> <free class="<?php echo strtolower($q->quiztype); ?>"> <?php echo "Quiz Type ".strtoupper($q->quiztype); ?></free></div><br />
<a href="<?php echo $hlink;?>"><button style="margin-bottom:10px"; type="button" class="btn btn-primary">Take Quiz</button>
</div>
                         
 
              

                      <?php }
                      }
                      else {
					  	echo "<h5>Sorry, no quizzes are available in the selected category.</h5>";
					  }
                       ?>

                      

                        </div>            

            </div>            
<br /><a href="<?php echo base_url();?>welcome/categories" class="button_medium_outline"><b>Go Back To Categories</b></a>
        </div>

        

        <div class="clearfix"></div>

    </div>
</div>
    

    