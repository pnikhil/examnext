<div data-ride="carousel" class="carousel slide banner" id="myCarousel">
<div class="carousel-caption">
              <h2>A Powerful Online Examination Portal to help you Analyse your Performance Better</h2>
              
            </div>
      <img src="<?php echo base_url(); ?>assets/designs/images/inner-banner.jpg" width="100%">
 
</div>
<!-- Slider-->
<!-- Middle Content-->
<div class="container-fluid content-bg">
   <div class="spacer"></div>
   <div class="container inner-content padding">
      <div class="col-md-8 col-xs-12">
         <h1 class="inner-hed"><?php if(isset($notificationTitle)) echo $notificationTitle; else echo "Notifications";?></h1>
         <div class="col-md-12 formgro">
            <?php if (count($notifications)>0) {
               foreach ($notifications as $n) {
               ?>	
            <?php if (!isset($notificationTitle)) echo "<h4  style=\"margin-top: 20px;\">".$n->title."</h4>"; ?>
            <p><?php echo $n->description;?></p>
            <br/>
            <div <?php if(!isset($notificationTitle)) { ?> style="border-bottom:2px dashed #ccc;margin-bottom:15px;margin-top: -10px;" <?php } ?>>
               Post Date: <p class="label label-success"><?php echo date('d-m-Y',strtotime($n->post_date));?></p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
               Last Date: <p  class="label label-info" style="margin-bottom:20px;"><?php echo date('d-m-Y',strtotime($n->last_date));?></p>
            </div><br />
            <?php if(isset($notificationTitle)) echo "<br/><a class=\"btn btn-danger\" style='float:left;margin-top: 20px; margin-bottom:20px;' href='".base_url()."welcome/notifications'>View all Notifications</a>"; ?>
            <?php } } ?>
         </div>
      </div>

   </div>
   <div class="spacer"></div>
</div>
</div>
<!-- Middle Content-->

