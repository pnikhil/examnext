
<script>
   function isChecked()
   {
   	if (document.getElementById("exam_chkbox").checked == true) {
   		window.location = '<?php echo base_url();?>exam/startexam/<?php echo $exams[0]->quizid;?>';
   	}
   	else {
   		alert("Please check the instructions.");
   		return false; 
   	}
   }
   
</script>
<?php 
   $message = $this->session->flashdata('message');
   if(isset($message)) echo $message;
?>
   
<section id="main-content" class=" ">
                <section class="wrapper" style='margin-top:40px;display:inline-block;width:100%;padding:15px 0 0 15px;'>
                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Exam Name - <?php $record =$exams[0]; echo $record->name; ?> </h2>
                            </header>
					<div class="col-lg-12">
							<center><em><h3>Please read the following instructions carefully</h3></em></center><br />
							
						
         
            <h4>General Instructions</h4>
         
      </div>
							
         
           
        <ol>
         Total of <?php echo $record->deauration;?> minutes duration will be given to attempt all the questions. <?php if($record->negativemarkstatus == "Active") echo "And there a penalty of minus ".$record->negativemark." marks for each wrong answer."; ?><br /><br />
         <li>The clock has been set at the server and the countdown timer at the top right corner of your screen will display the time remaining for you to complete the exam. When the clock runs out the exam ends by default - you are not required to end or submit your exam. </li>
         
           <li> The question palette at the right of screen shows one of the following statuses of each of the questions numbered: </li>
            <br><br>
            <table width="100%" border="0">
               <tr>
                  <td>
                     <div class="btn bg-primary not-visited"> <i class="fa fa-eye-slash"></i> </div>
                  </td>
                  <td>You have not visited the question yet.</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
               </tr>
               <tr>
                  <td></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
               </tr>
               <tr>
                  <td>
                     <div class="btn bg-primary not-answered"> <i class="fa fa-times-circle"></i> </div>
                  </td>
                  <td>You have not answered the question.</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
               </tr>
               <tr>
                  <td></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
               </tr>
               <tr>
                  <td>
                     <div class="btn bg-primary answered"> <i class="fa fa-check-square-o"></i> </div>
                  </td>
                  <td>You have answered the question. </td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
               </tr>
               <tr>
                  <td></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
               </tr>
               <tr>
                  <td>
                     <div class="btn bg-primary review"> <i class="fa fa-bolt"></i> </div>
                  </td>
                  <td>You have answered the question but have marked the question for review.</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
               </tr>
               <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
               </tr>
            </table>
         </li>
      </ol>
	 
	   <div class="infor-mation"> 
	<?php if ($is_authorized){
			if ($record->quiztype == 'Paid') {
					$cnt='';
					$txt='';
					if($record->validitytype=='Days') {
						$cnt = $payment_info[0]->validity;
						$txt = "You have ".$cnt." ". $record->validitytype." remaining to use this quiz";
						if($cnt == 0)
							$txt = "Today is the last day to use this quiz";
					}
					else {
						$cnt=$payment_info[0]->remainingattempts;
						$txt = "You have ".$cnt." ". $record->validitytype." remaining to use this quiz";
					}
			?>
			<strong> <?php echo $txt;?></strong>
	<?php	}
	?> 

	<?php } 
		  elseif ($record->quiztype == 'Paid') { 
		  $currency = $this->base_model->fetch_single_column_value('paypal','currency_code');
		 
		  ?>
				<strong>Please Buy this quiz at <?php echo $record->quizcost." ".$currency; ?>  for <?php echo $record->validityvalue ." ". $record->validitytype; ?> </strong>
		  
		  <?php } ?>
	 <div class="row">
         <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
            <br>
            <table width="100%" border="0">
			<?php if ($is_authorized) { ?>
               <tr>
                 
                  <td width="80%" class="btn btn-warning btn-corner" colspan="2">The computer provided to me is in proper working condition. I have read and understood the instructions given above.  
				  
                        <input style="margin-left:10px"; type="checkbox" class="icheckbox_square-grey" name="checkbox" id="exam_chkbox" >
                        
                     </td>
					
					
			   
			   </tr>
			   <?php } ?>
               <tr>
                  <td>&nbsp;</td>
                  <td colspan="2">
				  <?php if ($is_authorized) { ?>
                     <a style="cursor:pointer;" onclick="isChecked(); return false;">
                        <div class="btn btn-success btn-corner wnm-user rig-ht"> <i class="fa fa-sign-in"></i> Start Exam</div>
                     </a>
				 <?php } 
						else { ?>
						<a style="cursor:pointer;" target="_blank" href="<?php echo base_url();?>user/payment/paypal/<?php echo $record->quizid."/".$record->quizcost;?>">
                        <div class="btn btn-primary btn-corner wnm-user rig-ht"> <i class="fa fa-sign-in"></i> Go for Payment</div>
                     </a>
					 
										
						<?php }?>
					 
                  </td>
                  
               </tr>
            </table>
         </div>
      </div>
	
	
	</div>
      
                        </section>
					</div>
				</section>
</section>