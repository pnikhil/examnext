<style type="text/css">

#style-8::-webkit-scrollbar-track
{
	
	background-color: #F5F5F5;
}

#style-8::-webkit-scrollbar
{
	width: 10px;
	background-color: rgba(130,130,138,0.6);
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    -ms-border-radius: 0px;
    border-radius: 0px;
    -webkit-transition: background-color 0.2s linear;
    -moz-transition: background-color 0.2s linear;
    -o-transition: background-color 0.2s linear;
    transition: background-color 0.2s linear;
}

#style-8::-webkit-scrollbar-thumb
{
		background-color:rgba(130,130,138,1);
}

</style>
<?php 
   $this->session->set_userdata('isExamStarted',0);
?>
 <section id="main-content" class=" ">
                <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>
				
				<?php 
   $message = $this->session->flashdata('message');
   if(isset($message)) echo $message;?>
				
                   <div class="col-lg-12">
                        <section class="box">
						 <header class="panel_header">
                                <h2 class="title pull-left">Online Assessment Mock Test -  <?php echo $quiz_info->name; ?></h2>
                            </header>
							<div>
                    
							
                    
                    <div class="clearfix"></div>
					
<div class="row margin">
<div class="col-md-12">
   <div class="col-md-8">
      
         <?php
            $attributes = array('class' => 'email', 'id' => 'myform', 'name'=>'myform');
             echo form_open_multipart("exam/validateexam",$attributes);?>
        

         <div class="row">
            <div class="col-md-8">
               <div class="ga">
                  <div class="btn-group ga1 col-md-1">
                     <div class="subjectc" style="margin-bottom:10px";	>
                         Subject wise Answer Explanation: 
                           <?php foreach($quizRecords as $subj) { ?> 
                           
						   <a class="btn btn-orange btn-corner" href="#<?php echo $subj->subjectid."_1";?>"><?php echo $subj->subjectname;?></a>
						   <?php echo $qi->subjectname;?>
                           <?php } ?>
						                         
                     </div>
                  </div>
               </div>
            </div>
         
         <div  class="col-md-12 padd">
            
			<div class="panel-body  pre-scrollable scroll-height" id="style-8">
			
			
      <div class="force-overflow"></div>
    
                  <div id="morris-area-chart">
                     <?php $sno=1;foreach($questions as $row) { 
                        $i=1;
                        foreach($row as $q) {
                        
                        
                        ?>
                     <div class="col-md-12 padd border" id="<?php echo $q->subjectid."_".$i++;?>">
                        <h4 class="quction"><?php echo "<div class='one'>".$sno++.". </div>".$q->question;?></h4>
                        <table width="100%" border="0" class="answeers">
                           <input type="radio" name="<?php echo $q->questionid;?>" value="0" id="" style="display:none;" <?php if(isset($user_options[$q->questionid])) if($user_options[$q->questionid]==0) echo "checked";?> >
                           <?php 
                              if (isset($q->answer1)) {  
                               ?>
                           <tr>
                              <td>
                                 <input type="radio" name="<?php echo $q->questionid;?>" value="1" id="" <?php if(isset($user_options[$q->questionid])) if($user_options[$q->questionid]==1) echo "checked";?> >
                                 <?php echo $q->answer1;?>
                              </td>
                           </tr>
                           <?php } ?>
                           <?php 
                              if (isset($q->answer2)) {  
                               ?>
                           <tr>
                              <td>
                                 <input type="radio" name="<?php echo $q->questionid;?>" value="2" id="" <?php if(isset($user_options[$q->questionid])) if($user_options[$q->questionid]==2) echo "checked";?> >
                                 <?php echo $q->answer2;?>
                              </td>
                           </tr>
                           <?php } ?>
                           <?php 
                              if (isset($q->answer3)) {  
                               ?>
                           <tr>
                              <td>
                                 <input type="radio" name="<?php echo $q->questionid;?>" value="3" id="" <?php if(isset($user_options[$q->questionid])) if($user_options[$q->questionid]==3) echo "checked";?> >
                                 <?php echo $q->answer3;?>
                              </td>
                           </tr>
                           <?php } ?>
                           <?php 
                              if (isset($q->answer4)) {  
                               ?>
                           <tr>
                              <td>
                                 <input type="radio" name="<?php echo $q->questionid;?>" value="4" id="" <?php if(isset($user_options[$q->questionid])) if($user_options[$q->questionid]==4) echo "checked";?> >
                                 <?php echo $q->answer4;?>
                              </td>
                           </tr>
                           <?php } ?>
                           <?php 
                       //       if (isset($q->answer5)) {  
                               ?>
                           <!--tr>
                              <td>
                                 <input type="radio" name="<?php echo $q->questionid;?>" value="5" id="" <?php if(isset($user_options[$q->questionid])) if($user_options[$q->questionid]==5) echo "checked";?> >
                                 <?php echo $q->answer5;?>
                              </td>
                           </tr-->
                           <?php // } ?>
                           <tr>
                              <td> </td>
                           </tr>
                           <tr>
                              <td>
                                 <div class="btn btn-primary btn-corner   <?php if(isset($user_options[$q->questionid])){ if($user_options[$q->questionid]==$answers[$q->questionid])  echo "correct-answ"; else echo "wrong-answ"; } else echo "wrong-answ";?>">Correct answer: <?php echo $answers[$q->questionid]; ?></div>
                               
                              </td>
                           </tr>
                        </table>
                          <span class="exp"><strong>Explaination:</strong> </br> <?php echo $q->hint;?></span>
                     </div>
                     <?php } } ?>
                  </div>
               </div>
			
         </div>
     </div>
	 </div>
      <div class="col-md-4">
        <div class="lates-users">
            <header class="panel_header">
                                <p class="title pull-left">Quiz Info <i class="fa fa-exclamation-circle"></i></p>
                            </header>
            <div class="recent-msg-total" style="margin-top:10px";>
               <div class="lates-users-img-hed quiz-hed">
                  Total Questions:<br>
               </div>
               <div class="btn btn-primary btn-corner"><?php echo $totalQuestions; ?></div>
            </div>
            <div class="recent-msg-total">
               <div class="lates-users-img-hed quiz-hed">
                  Time (minutes):<br>
               </div>
               <div class="btn btn-success btn-corner"><?php echo $quiz_info->deauration; ?></div>
            </div>
            <?php if(isset($negativeMark)) { ?>
            <div class="recent-msg-total">
               <div class="lates-users-img-hed quiz-hed">
                  Negative Mark:<br>
               </div>
               <div class="btn btn-danger btn-corner"><?php echo $negativeMark; ?></div>
            </div>
            <?php } ?>   
         </div>
		 <div class="lates-users top">
           
			
			<header class="panel_header">
                                <p class="title pull-left">General Info <i class="fa fa-clock-o"></i></p>
                            </header>
            <div class="recent-msg-total"  style="margin-top:10px";>
               <div class="lates-users-img-hed quiz-hed">
                  Your Score is 
                  :
               </div>
               <div class="btn btn-primary btn-corner"><?php echo $score; ?> / <?php echo $totalQuestions; ?></div>
            </div>
         </div>
		 <div class="lates-users top">
            		
			<header class="panel_header">
                                <p class="title pull-left">Results Summary <i class="fa fa-tasks"></i></p>
                            </header>
            <div class="recent-msg-total mar-resu-summ">
               <div class="lates-users-img-hed quiz-hed result-sum-hed">
                  Attempted Questions : <?php echo $attempted_percentage.'%';?> 
               </div>
               <div class="progress gress">
                  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $attempted_percentage.'%';?>">
                     <span class="sr-only"><?php echo $attempted_percentage.'%';?> Complete</span>
                  </div>
               </div>
            </div>
            <div class="recent-msg-total mar-resu-summ">
               <div class="lates-users-img-hed quiz-hed result-sum-hed">
                  Correct Answers : <?php echo $score_percentage.'%';?> 
               </div>
               <div class="progress gress">
                  <div class="progress-bar  progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: <?php if($score_percentage < 0) echo '0%'; else echo $score_percentage.'%';?>">
                     <span class="sr-only"><?php echo $score_percentage.'%';?> Complete</span>
                  </div>
               </div
                  >
            </div>
            <div class="recent-msg-total mar-resu-summ">
               <div class="lates-users-img-hed quiz-hed result-sum-hed">
                  Wrong Answers : <?php echo $wrong_percentage.'%';?> 
               </div>
               <div class="progress gress">
                  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $wrong_percentage.'%';?>">
                     <span class="sr-only"><?php echo $wrong_percentage.'%';?> Complete (warning)</span>
                  </div>
               </div>
            </div>
         </div>
		  <div class="lates-users top">
            
			<header class="panel_header">
                                <p class="title pull-left">High Scores in this Quiz <i class="fa fa-flag"></i></p>
                            </header>
            <?php if(count($previous_score)) { 
               foreach($previous_score as $s) {
               
               ?>
            <div class="recent-msg-total">
               <div class="lates-users-img">
                  <img src="<?php echo base_url();?>assets/uploads/images(200x200)/<?php if(isset($s->image)&&$s->image!='')echo $s->image; else echo "dflt-user-icn.png";?>" width="50" height="50">
               </div>
               <div class="lates-users-img-hed quiz-hed">
                  <?php echo $s->username;?> <br>
                  <small><?php echo $s->dateoftest."  ".$s->timeoftest;?></small><br>
               </div>
               <div class="btn btn-info btn-corner" style="margin-top:15px";><?php echo $s->score; ?> / <?php echo $totalQuestions; ?></div>
            </div>
            <?php } } else echo '<div class="recent-msg-total">No Records Available.</div>';?>
         </div>
         
      </div>
	  </div>
   </div>
</div>
</section></div>

	</section>
</section>

<link href="<?php echo base_url();?>assets/designs/css/style.css" rel="stylesheet">

<script type="text/javascript" src="<?php echo base_url();?>assets/designs/js/TableBarChart.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>assets/designs/css/TableBarChart.css" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script type="text/javascript">
   $(function() {
   	$('#source').tableBarChart('#target', '', false);
   	});
   
</script>
<style>
   .progress-bar {
   border-radius: 2px;
   box-shadow: 0 2px 3px rgba(0, 0, 0, 0.25) inset;
   width: 250px;
   height: 20px;
   position: relative;
   display: block;
   }
   .progress-bar > span {
   background-color: blue;
   border-radius: 2px;
   display: block;
   text-indent: -9999px;
   }
</style>

