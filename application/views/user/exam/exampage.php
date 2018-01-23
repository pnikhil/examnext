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
                                <h2 class="title pull-left">Online Assessment Mock Test - <?php if(isset($quizName)) echo "(".$quizName.")";?></h2>
                            </header>
							
							
                    
                    <div class="clearfix"></div>
					
<div class="row margin">
   <div class="col-md-12">
      <div class="col-md-8 ">
         <?php
            $attributes = array('class' => 'email', 'id' => 'myform', 'name'=>'myform');
             echo form_open_multipart("exam/validateexam",$attributes);?>
        

         <div class="row">
            <div class="col-md-12">
               <div class="ga">
                  <div class="btn-group ga1">
                     <div class="subjectc" style="margin-bottom:10px";	>
                         Subjects: 
                           <?php if (count($quiz_info)) {
                              foreach($quiz_info as $qi) {
                              ?>  
                           <div class="btn btn-orange btn-corner"  onclick="showSubjectQuestions('<?php echo $qi->subjectid;?>');">
						   <?php echo $qi->subjectname;?></div>
                           <?php } 
						   } 
						   ?>
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div  class="col-md-12 padd">
            <!--Print questions here-->
            <div id="divs">
               <?php 
                  $question_slno=1; 
                  if(count($this->session->userdata('questions'))) {
                  
                  $totRowCount = 0;
                  foreach($this->session->userdata('questions') as $row) {
                  	
                  	$totRowCount = $totRowCount + count($row);
                  	$i=0;
                  	
                  	foreach($row as $q) {		
                  	$i++;
                  ?>
               <div id="<?php echo $q->subjectid."_".$i;?>"  class="display_question" >
                  
                     <span class="question btn btn-primary btn-xs btn-corner btn-border" style="margin-bottom:10px";	> Question No. <?php echo $question_slno++; ?></span>
                  <br />
                  <h4 class="quction"  > 
                     <?php echo $q->question;?> 
                  </h4>
                  <table width="100%" border="0" class="answeers">
                     <input type="hidden" name="<?php echo $q->questionid;?>" value="0" id="" checked >
                     <?php 
                        if (isset($q->answer1)) {  
                         ?>
                     <tr>
                        <td>
                           <input type="radio" name="<?php echo $q->questionid;?>" value="1" id="">
                           <?php echo $q->answer1;?>
                        </td>
                     </tr>
                     <?php } ?>
                     <?php 
                        if (isset($q->answer2)) {  
                         ?>
                     <tr>
                        <td>
                           <input type="radio" name="<?php echo $q->questionid;?>" value="2" id="">
                           <?php echo $q->answer2;?>
                        </td>
                     </tr>
                     <?php } ?>
                     <?php 
                        if (isset($q->answer3)) {  
                         ?>
                     <tr>
                        <td>
                           <input type="radio" name="<?php echo $q->questionid;?>" value="3" id="">
                           <?php echo $q->answer3;?>
                        </td>
                     </tr>
                     <?php } ?>
                     <?php 
                        if (isset($q->answer4)) {  
                         ?>
                     <tr>
                        <td>
                           <input type="radio" name="<?php echo $q->questionid;?>" value="4" id="">
                           <?php echo $q->answer4;?>
                        </td>
                     </tr>
                     <?php } ?>
                     <?php 
                        //if (isset($q->answer5)) {  
                         ?>
                     <!--tr>
                        <td>
                           <input type="radio" name="<?php echo $q->questionid;?>" value="5" id="">
                           <?php echo $q->answer5;?>
                        </td>
                     </tr-->
                     <?php // } ?>
                  </table>
               </div>
               <?php } 
				 } 
			   }
			   ?>
            </div>
            <!--End Print questions here-->
         </div>
         <div class="col-md-12 padd  down-buttons">
            <div class="col-md-8">
               <div id="prev" class="btn btn-info btn-corner  down-bt">Previous</div>
               <div id="mnext" class="btn btn-warning btn-corner down-bt">Mark for Review & Next</div>
               <div id="next" class="btn btn-info btn-corner  down-bt">Next</div>
               <div id="clearAnswer" class="btn btn-secondary btn-corner down-bt">Clear Answer</div>
            </div>
            <div class="col-md-4">
               <input type="submit" id="finish" class="btn bg-primary down-bt finished" value="Finish" name="Finish" onclick="return confirm('Are you sure you want to submit the quiz?')"/>
               
            </div>
         </div>
         <?php echo form_close();?> 
      </div>
      <div class="col-md-4">
         <div class="timer bg-primary">
            
            <div class="timer-img-con">Time Left : <span id="mins"></span>:<span id="seconds"></span>
               <?php if(isset($negativeMark)) echo "&nbsp;&nbsp;&nbsp;&nbsp;Negative Mark: ".$negativeMark; ?>
               <br>
              
            </div>
			<input type="hidden" name="minutes" id="mins1">
			<input type="hidden" name="seconds" id="seconds1">
		
              
                  <div style="color:black";>Question Palette :</div>
              
               <div class="col-md-12">
                  <div class="number-plate">
                     <?php 
                        $cnt=1;
                        foreach ($this->session->userdata('questions') as $row) {
                        $i=1;
                        	foreach($row as $q) {		?>
                     <li id="<?php echo "number-". $q->subjectid."_".$i;?>" onclick="showQuestion('<?php echo "#".$q->subjectid."_".$i;?>');" class="btn btn-primary btn-corner numbers"  >
                        <?php echo $cnt++;?>
                     </li>
                     <?php 
                        $i++;
                           } 
						} 
					  ?>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="lagend" style="color:black";>
                     <table width="90%" border="0">
                        <tr>
                           <td>
                              <h4>Status</h4>
                           </td>
                           <td></td>
                        </tr>
                        <tr>
                           <td>
                              <div class="btn btn-orange answered btn-corner mar-lgn"><span class="aq-answered">0</span></div>
                              Answered
                           </td>
                           <td>
                              <div class="btn btn-purple not-answered btn-corner mar-lgn"><span class="an-answered">0</span></div>
                              Not Answered
                           </td>
                        </tr>
                        <tr>
                           <td>   </td>
                           <td>  </td>
                        </tr>
                        <tr>
                           <td>
                              <div class="btn btn-warning btn-corner review mar-lgn"><span class="am-answered">0</span></div>
                              Marked
                           </td>
                           <td>
                              <div class="btn btn-danger not-visited btn-corner mar-lgn"><span class="az-answered">0</span></div>
                              Not Visited
                           </td>
                        </tr>
                     </table>
                  </div>
               </div>
               <div class="col-md-12" style="padding:10px 0;">
               </div>
            </div>
         
      </div>
   </div>
</div>
</section></div>
					</section>
					
					
            </section>


<link href="<?php echo base_url();?>assets/designs/css/style.css" rel="stylesheet">

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<script>
$(document).ready(function(){

	//Disable Browser Back Button
	history.pushState({ page: 1 }, "title 1", "#nbb");
    window.onhashchange = function (event) {
        window.location.hash = "nbb";

    };

	//DisableF5 key 
	document.onkeydown = function (e) {
        return (e.which || e.keyCode) != 116;
    };
	
	// Disable Right click
	$(document).bind('contextmenu',function(e){
        e.preventDefault();
      });

   updateSummary();
    $(".display_question").each(function(e) {
           if (e != 0)
               $(this).hide();
       });
   	
       $("#next").click(function(){
   		$("#prev").show();
   		var  numberPlateId ="#"+"number-"+$(".display_question:visible").attr('id');
   		if($(".display_question:visible table input:radio:checked").length == 0)
   		$(numberPlateId).removeClass('q-answered m-answered n-answered z-answered').addClass('n-answered');
   		else
   		$(numberPlateId).removeClass('q-answered m-answered n-answered z-answered').addClass('q-answered');
           if ($(".display_question:visible").next().length != 0)
               $(".display_question:visible").next().fadeIn(1000).prev().hide();
           else {
               
   			$(this).hide();
           }
   		updateSummary();
           return false;
       });
   	
   	$("#mnext").click(function(){
   		$("#prev").show();
   		
   		var  numberPlateId ="#"+"number-"+$(".display_question:visible").attr('id');
   		if($(".display_question:visible table input:radio:checked").length == 0)
   		$(numberPlateId).removeClass('q-answered m-answered n-answered z-answered').addClass('n-answered');
   		else
   		$(numberPlateId).removeClass('q-answered m-answered n-answered z-answered').addClass('m-answered');
   		
           if ($(".display_question:visible").next().length != 0)
               $(".display_question:visible").next().fadeIn(1000).prev().hide();
           else {
              $(this).hide();
           }
   		updateSummary();
           return false;
       });
   
       $("#prev").click(function(){
   		$("#next").show();
           if ($(".display_question:visible").prev().length != 0)
               $(".display_question:visible").prev().fadeIn(1000).next().hide();
           else {
              
   			$(this).hide();
           }
   		updateSummary();
           return false;
       });
   	
   	  $("#clearAnswer").click(function(){
   		//$("#next").show();
   		var  numberPlateId ="#"+"number-"+$(".display_question:visible").attr('id');
   		if($(".display_question:visible table input:radio:checked").length != 0)
   		{
   		$(".display_question:visible table input:radio:checked").removeAttr("checked");
   			$(numberPlateId).removeClass('q-answered m-answered n-answered z-answered').addClass('z-answered');
   		}
   		else
   		alert('No Answer Selected');
   		
           
   		updateSummary();
           return false;
       });

    var mins=60;
   		 var sec = 60;

			intilizetimer();

   });
   
   function showSubjectQuestions(id){
   $('.display_question').hide();
   $('#'+id+'_1').fadeIn(1000);
   $("#next").show();
   $("#prev").show();
   }
   
   function showQuestion(id){
   
   $('.display_question').hide();
   $(id).fadeIn(1000);
   $("#next").show();
    $("#prev").show();
   }
   
   function updateSummary()
   {
   	$(".am-answered").text($(".number-plate .m-answered").length);
   	$(".az-answered").text($(".number-plate .z-answered").length);
   	$(".an-answered").text($(".number-plate .n-answered").length);
   	$(".aq-answered").text($(".number-plate .q-answered").length);
   }
   
   
   	function intilizetimer()
   		 {
   		 	 //totaltime = $("#totaltime").text().split(":");
   			 mins = <?php if(isset($minutes) && $minutes != '') echo $minutes; else echo $quizTime; ?>;
				$("#mins").text(mins);
				$("#mins1").text(mins);
   			 sec = <?php if(isset($seconds) && $seconds != '') echo $seconds; else echo "0"; ?>;
   			 startInterval();
   		 }
   		 
   		 function tictac(){
   			sec--;
   			if(sec<=0)
   			{
   				mins--;
   				$("#mins").text(mins);
   				$("#mins1").text(mins);
   				if(mins<1)
   				{
   					$("#timerdiv").css("color", "red");
   				}
   				if(mins<0)
   				{
   					stopInterval();
   					$("#mins").text('0');
   					$("#mins1").text('0');
   					alert('You are exceeded the time to finish the exam.');
   					$('#finish').removeAttr('onclick');
   					$('#finish').click();

   				}

   				sec=60;
   			}
   			if(mins>=0) {
   			$("#seconds").text(sec);
   			$("#seconds1").text(sec);
			}
   			else {
   			$("#seconds").text('00');
   			$("#seconds1").text('00');
			}

			//Ajax
			$.ajax({

				type:'POST',
				url:'<?php echo base_url();?>exam/setInterval',
				data:'minutes='+mins+'&seconds='+sec+'&<?php echo $this->security->get_csrf_token_name();?>=<?php echo $this->security->get_csrf_hash();?>',
				cache:false,
				success: function(data) {
					
				}
			});

   		}
   		function startInterval()
   		{
   		timer= setInterval("tictac()", 1000);
   		}
   		function stopInterval()
   		{
   			clearInterval(timer);
   		}
		
</script>
