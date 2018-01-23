<section id="main-content" class=" ">
                <section class="wrapper" style='margin-top:40px;display:inline-block;width:100%;padding:15px 0 0 15px;'>
                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Payment History</h2>
                                
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">



                                        <!-- ********************************************** -->


                                        <table id="example" class="display table table-hover table-condensed" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
             <th>S.No.</th>
               <th>Quiz Name</th>
               <th>Cost</th>
               <th>Payer Name</th>
               <th>Payer Email</th>
			   <th>Transaction Id</th>
			   <th>Subscribed Date</th>
			    <th>Validity </th>
                <th>Remaining</th>
            </tr>
                                            </thead>
<tbody>
            <?php if (count($records)>0) { 
					$i=1;
					foreach ($records as $r) {
               ?>
            <tr>
               <td><?php echo $i++;?></td>
               <td><?php echo $r->quizname;?></td>
               <td><?php echo $r->cost;?></td>
               <td><?php echo $r->payer_name;?></td>
               <td><?php echo $r->payer_email;?></td>
			   <td><?php echo $r->transaction_id;?></td>
			   <td><?php echo date('d-m-Y',strtotime($r->dateofsubscription));?></td>
			   <td><?php echo $r->validityvalue ." ".$r->validitytype;?></td>
			   <td><?php 
			   if ($r->validitytype=='Attempts') {
				if ($r->remainingattempts==0) {
						echo "<code> Completed</code>";
				}
				else {
					echo "<code class='naresh-code'>".$r->remainingattempts." Attempts</code>";
				}
			   }
			   else {
					 
						$datetime1 = date_create(date('Y-m-d'));
						$datetime2 = date_create($r->expirydate);
						$interval = date_diff($datetime1, $datetime2);
						$days = $interval->format('%R%a');
						 
						if($days>0)
							echo "<code class='naresh-code'>".$days . " Days</code>";
						else
							echo "<code> Completed</code>";
					
				}
			   
			   ?></td>
			   
             
            </tr>
            <?php } 
			} 
			else "<tr><td colspan='4'>No Data Available.</td></tr>"; 
			?>
         </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </section></div>
						
						 <?php echo validation_errors();
								echo $this->session->flashdata('message');
						?>
						</section>
						</section>		