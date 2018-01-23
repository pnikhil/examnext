<!-- Bootstrap -->
<link href="<?php echo base_url();?>assets/designs/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/designs/css/font-awesome.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/designs/css/style.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/designs/font.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/designs/css/jquery.dataTables.css" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/designs/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/designs/js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" class="init">
   $(document).ready(function() {
   	$('#example').dataTable();
   });
</script>
<script src="<?php echo base_url();?>assets/designs/js/bootstrap.min.js"></script>
<div class="col-md-12 padd">
   <div class="bradcome-menu">
      <ul>
         <li><a href="<?php echo base_url();?>admin">Home</a></li>
         <li><img  src="<?php echo base_url();?>assets/designs/images/arrow.png"></li>
         <li><a href="<?php if(isset($subject_id)) echo base_url().'admin/questionsindex'; else echo '#';?>">   Questions </a></li>
         <?php if (isset($subject_id)) { ?>
         <li><img  src="<?php echo base_url();?>assets/designs/images/arrow.png"></li>
         <li><a href="#">  <?php echo $subject_name;?>  </a></li>
         <?php } ?>
      </ul>
   </div>
</div>
<div class="row">
   <?php echo validation_errors();
      echo $this->session->flashdata('message');
      ?>
   <div class="col-md-5">
      <div class="ga">
         <div class="btn-group ga1">
            <a href="<?php echo base_url();?>admin/addeditQuestions" class="btn btn-default dropdown-toggle ga-btn">
            Upload Question
            </a>
            &nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>admin/uploadexcel"  class="btn btn-default dropdown-toggle ga-btn">
            Upload Question by excel
            </a>
         </div>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-md-12">
      <?php if(isset($subject_id)) { ?>
      <div style="text-align: center; margin-bottom: 10px; background: none repeat scroll 0px 0px rgb(246, 246, 246); border: 1px solid rgb(243, 243, 243);" id="subject_details">
         <p><b>Subject Id:</b> <?php echo $subject_id;?><br/><b>Name:</b> <?php echo $subject_name;?><br/><b>Total Questions:</b> <?php echo count($records);?></p>
      </div>
      <?php } ?>
      <table id="example" class="cell-border" cellspacing="0" width="100%">
         <thead>
            <tr>
               <th>S.No.</th>
               <th>Question Type</th>
               <th>Question</th>
               <th>Answer</th>
               <th>Difficulty Level</th>
               <th>Status</th>
               <th>Action</th>
            </tr>
         </thead>
         <tfoot>
            <tr>
               <th>S.No.</th>
               <th>Question Type</th>
               <th>Question</th>
               <th>Answer</th>
               <th>Difficulty Level</th>
               <th>Status</th>
               <th>Action</th>
            </tr>
         </tfoot>
         <tbody>
            <?php if (count($records)>0) { 
               $i=1;
               foreach($records as $r) {
                              ?>
            <tr>
               <td><?php echo $i++;?></td>
               <td><?php echo $r->questiontype;?></td>
               <td><?php echo $r->question;?></td>
               <td><?php $ans = "answer".$r->correctanswer; echo $r->$ans;?></td>
               <td><?php echo $r->difficultylevel;?></td>
               <td><?php echo $r->status;?></td>
               <td>
                  <a href="<?php echo base_url();?>admin/addeditQuestions/<?php echo $r->questionid;?>/<?php echo cleanString($r->subjectname);?>" class="btn bg-primary wnm-user"> <i class="fa fa-edit"></i> Edit</a>
                  <a href="<?php echo base_url();?>admin/questions/delete/<?php echo $r->questionid;?>" onclick="return confirm('Are you sure you want to delete this record?')" class="btn bg-primary wnm-user"><i class="fa fa-times-circle"></i> Delete</a>
               </td>
            </tr>
            <?php 
			} 
			} else "<tr><td colspan='4'>No Data Available.</td></tr>"; ?>
         </tbody>
      </table>
   </div>
</div>
