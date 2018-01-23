

<section id="main-content" class=" ">
                <section class="wrapper" style='margin-top:40px;display:inline-block;width:100%;padding:15px 0 0 15px;'>
                    <div class="col-lg-10 col-md-4 col-xs-8 col-sm-8">
                        <section class="box ">
                             <header class="panel_header">
                                <h2 class="title pull-left">Quiz History</h2>
                            </header>

                           
      <?php if (count($quiz_history)) {
         foreach ($quiz_history as $h) {
      ?>
    
        
            <div class="panel panel-default  box-shadow">
             
               <div class="panel-body">
                  <div class="col-md-12"> 
				  <?php echo "Name of Quiz: <b>".$h->name."</b>";?> <br />
				  Total Attempts : <?php echo $h->total_attempts;?>  <br /> Date of exam: <?php echo $h->dateoftest;?>  </div>
                  <?php
                     //Calculate Best Score Percentage
                     $bestPercentage = ($h->score/$h->total_questions)*100;
                     
                  ?>
                  <div class="col-md-12">
                     <div class="exam-histroy  mar-resu-summ">
                        <div class="lates-users-img-hed quiz-hed result-sum-hed">
                           Best Score : <?php echo number_format($bestPercentage,2)."% answering ".$h->score;?>/<?php echo $h->total_questions." questions correctly";?> 
                        </div>
							
                              

                                           <center> <span class="easypiechart3 easypiechart" height="200" width="400" data-percent="<?php echo $bestPercentage;?>"><span class="percent"></span></span></center>
                           
                       
                     </div>
                  </div>
                  <div class="col-md-12">
						
                     <div class="col-md-5">
                        <a href="<?php echo base_url();?>user/performance/<?php echo $h->quiz_id;?>" target="_blank">
                           <div class="btn btn-info btn-corner exam-histry-btn"> View</div>
                        </a>
                     </div>
                     <div class="col-md-5">
                        <a href="<?php echo base_url();?>user/certificate/<?php echo $h->quiz_id;?>" target="_blank">
                           <div class="btn btn-success btn-corner exam-histry-btn">Download Certificate </div>
                        </a>
                     </div>
                     <div class="col-md-2 rank-exam">
                        <a href="<?php echo base_url();?>user/instructions/<?php echo $h->quiz_id;?>/<?php echo $h->name;?>">
                           <div class="btn btn-primary btn-corner exam-histry-btn"> Retake Exam </div>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
        
     
      <?php } 
	  } 
	  else echo '<div class="col-md-12">
         <div class="col-md-12 padd">
         <div class="panel panel-default  box-shadow">
         <div class="panel-heading p-hed">No History Available. <a href="'.base_url().'user">Click here</a> to take the exam/quiz.</div>
         
         </div>
         </div>
          </div>';
		  ?>
   
                        </section></div>
</section>
						</section>
						
						<script src="<?php echo base_url();?>assets/designs/admin/plugins/jquery-knob/jquery.knob.min.js" type="text/javascript"></script><script src="<?php echo base_url();?>assets/designs/admin/js/chart-easypie.js" type="text/javascript"></script><script src="<?php echo base_url();?>assets/designs/admin/js/chart-knobs.js" type="text/javascript">