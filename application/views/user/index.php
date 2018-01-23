<style type="text/css">
.scroll-height{ min-height:340px !important}
#style-8::-webkit-scrollbar-track
{
	
	background-color: #F5F5F5;
	border-radius:5px;
	border: thin solid lightgray;
}

#style-8::-webkit-scrollbar
{
	width: 10px;
	
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
	background-color: #AAA;
	border-radius: 10px;
	border: thin solid lightgray;

}
::-webkit-scrollbar-button {
	width: 4px;
	height:5px;
}

</style>

<script type="text/javascript" src="<?php echo base_url();?>assets/designs/js/bar-chart.js"></script>
<script type="text/javascript">
<?php if($result!="") { ?>
   google.load("visualization", "1", {packages:["corechart"]});
   google.setOnLoadCallback(drawChart);
   function drawChart() {
     var data = google.visualization.arrayToDataTable([
       <?php echo $result;?>
     ]);
   
     var options = {
       title: 'My Performance in Quizzes',
       vAxis: {title: 'Name of the Quiz',  titleTextStyle: {color: 'black'}}
     };
   
     var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
     chart.draw(data, options);
   }
   <?php } ?>
   
</script>

<!--  SIDEBAR - END -->
            <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>
				
				<?php 
   $message = $this->session->flashdata('message');
   if(isset($message)) echo $message;?>

                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">Dashboard</h1>  </div>


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
						 <div class="col-sm-6 col-lg-3">
                            <a class="block block-rounded block-link-hover3 text-center" href="#latest_quizzes">
                                <div class="block-content block-content-full bg-warning">
                                   <i style="font-size:40px"; class="fa fa-question-circle icon-xlg icon-rounded icon-warning"></i>
                                   
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-white text-white">
                                    <h4>LATEST QUIZ</h4>
                                </div>
                            </a>
                        </div>
							 <div class="col-sm-6 col-lg-3">
                            <a class="block block-rounded block-link-hover3 text-center" href="<?php echo base_url();?>user/quiz_history">
                                <div class="block-content block-content-full bg-orange">
                                    <i style="font-size:40px"; class="fa fa-dashboard icon-xlg icon-rounded icon-orange"></i>
                                   
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-white text-white">
                                    <h4>QUIZ HISTORY</h4>
                                </div>
                            </a>
                        </div>
						
						<div class="col-sm-6 col-lg-3">
                            <a class="block block-rounded block-link-hover3 text-center" href="<?php echo base_url();?>user/profile">
                                <div class="block-content block-content-full bg-info">
                                    <i style="font-size:40px"; class="fa fa-user icon-xlg icon-rounded icon-info"></i>
                                   
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-white text-white">
                                    <h4>USER PROFILE</h4>
                                </div>
                            </a>
                        </div>


                                </div>
                            </div>
                        </section></div>
						
						
						<div class="col-lg-6">
                        <section class="box">
						 <header class="panel_header">
                                <h2 class="title pull-left"> <i class="fa fa-question-circle"></i> Recent User Quizzes</h2>
                            </header>
                            <div>    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="wid-notification">
                                          <div  class="panel-body  pre-scrollable scroll-height" id="style-8">
												<div class="force-overflow"></div>

                                            <div class="list-unstyled notification-widget">
											 <?php if(count($recentUserQuizzes)) { 
                  foreach($recentUserQuizzes as $l) {
                  
                  ?>

                                                <li class="unread status-available">
                                                    
                                                        <div class="user-img">
                                                             <img src="<?php echo base_url();?>assets/uploads/images(200x200)/<?php if(isset($l->image)&&$l->image!='')echo $l->image; else echo "dflt-user-icn.png";?>" width="50" height="50">
                  
                                                        </div>
                                                        <div>
                                                            <span class="name">
                                                                <?php echo "<strong>".$l->username."</strong>";?>
																<?php echo "took ".$l->name;?>
                                                                <span class="time small"> on <?php echo $l->dateoftest;?></span>
																
                                                            </span>
                                                            <span class="desc small">
                                                                
																<?php echo "Questions Answered Right: ".$l->score."/".$l->total_questions;?>	
																
                                                            </span>
															<div>
                                                               
																
                                                            </div>
															
                                                        </div>
                                                    
                                                </li>
<?php } }?>

                                               
                                            
								</div></div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section></div>
						

						
						<div class="col-lg-6">
                        <section class="box">
						 <header class="panel_header">
                                <h2 class="title pull-left"><i class="fa fa-users"></i> Top Rankers</h2>
                            </header>
                            <div>    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
									<div class="wid-notification">
									<div  class="panel-body  pre-scrollable scroll-height" id="style-8">
												<div class="force-overflow"></div>
                                       <div class="list-unstyled notification-widget">
											<?php if (count($topRankers)) { 
										foreach ($topRankers as $t) {
									?>

                                               <li class="status-offline">
                                                    
                                                        <div class="user-img">
                                                              <img src="<?php echo base_url();?>assets/uploads/images(200x200)/<?php if(isset($t->image)&&$t->image!='')echo $t->image; else echo "dflt-user-icn.png";?>" width="50" height="50">
                                                        </div>
                                                        <div>
                                                            <span>
                                                                <?php echo "<strong>".$l->username."</strong>";?>
																
                                                                <span class="time small" style="color:black"><?php echo "on ".$t->dateoftest." at ".$t->timeoftest;?></span>
																
                                                            </span>
                                                            <span class="desc small">
                                                                
																<h4><div class="btn btn-success btn-corner pull-right" style="cursor:default;"><?php echo "Quiz name: ".$t->name.", Score: ".$t->score."/".$t->total_questions;?></div></h4>
																
                                                            </span>
															<div>
                                                               
																
                                                            </div>
															
                                                        </div>
                                                    
                                                </li>

<?php } }?>
           
								</div>
                                          
                                        </div></div>

                                    </div>
                                </div>
                            </div>
                        </section></div>
						
						
						
							
						<div class="col-lg-6" id="latest_quizzes">
                        <section class="box">
						 <header class="panel_header">
                                <h2 class="title pull-left"><i class="fa fa-tasks"></i> Latest Exams</h2>
                            </header>
                            <div>    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 padd">
									
                                        <div class="wid-notification">
                                           <div  class="panel-body  pre-scrollable scroll-height" id="style-8">
												<div class="force-overflow"></div>
												
                                            <div class="list-unstyled notification-widget">
											
											
								<?php if (count($exams) > 0) { 
										foreach ($exams as $exam ) {
								?>

                                                <li class="unread status-available">
                                                    
                                                        
                                                        <div>
                                                            <span class="name">
                                                                <strong><?php echo $exam->name; ?></strong>
                                                                <span class="time small">(Exam Type: <?php echo $exam->quiztype; ?>&nbsp; Duration: <?php echo $exam->deauration;?> minutes)</span>
																
                                                            </span>
                                                            
															<div><br />
                                                               <a href="<?php echo base_url();?>user/instructions/<?php echo $exam->quizid;?>/<?php echo $exam->name;?>" >
                  <div class="btn btn-success btn-corner">View</div>
               </a>
               <a href="<?php echo base_url();?>user/instructions/<?php echo $exam->quizid;?>/<?php echo $exam->name;?>" >
                  <div class="btn btn-primary btn-corner" >Take Exam</div>
               </a>
																
                                                            </div>
															
                                                        </div>
                                                    
                                                </li>
<?php } }?>

											</div></div></div>

                                        </div>
</div>
                                    </div>
                                </div>
                            
                        </section></div>
					</section>
			</section>
 </div>
