

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
<li><a href="#">   Dynamic Pages </a></li>
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
   <a href="<?php echo base_url();?>admin/aboutUs/Add" class="btn btn-default dropdown-toggle ga-btn">
  Add Page
  </a>
 </div>
 
 </div>
 
 </div>	

 </div>
 
 <div class="row">
 <div class="col-md-12">
<table id="example" class="cell-border" cellspacing="0" width="100%">
			  <thead>
					<tr>
						<th>S.No.</th>
						<th>Name</th>
						<th>Meta Title</th>
						<th>Meta Description</th>
						<th>SEO Keywords</th>
						<th>is Bottom</th>
						<th>Sort Order</th>
						<th>Parent ID</th>
						<th>Status</th>
						<th>Action</th>
						
					</tr>
				</thead>

				<tfoot>
					<tr>
						<th>S.No.</th>
						<th>Name</th>
						<th>Meta Title</th>
						<th>Meta Description</th>
						<th>SEO Keywords</th>
						<th>is Bottom</th>
						<th>Sort Order</th>
						<th>Parent ID</th>
						<th>Status</th>
						<th>Action</th>
						
					</tr>
				</tfoot>

				<tbody>
				
				<?php if(count($aboutus_recs)>0) { 
					$i=1;
					foreach($aboutus_recs as $row)
					{
				
				?>
				
					<tr>
						<td><?php echo $i++;?></td>
						<td><?php echo $row->name;?></td>
                        <td><?php echo $row->meta_tag;?></td>
                        <td><?php echo $row->meta_description;?></td>
                        <td><?php echo $row->seo_keywords;?></td>
                        <td><?php echo $row->is_bottom;?></td>
                        <td><?php echo $row->sort_order;?></td>
                        <td><?php echo $row->parent_id;?></td>
                        <td><?php echo $row->status;?></td>
						<td>
						<a class="btn btn-warning" type="button" href="<?php echo base_url(); ?>admin/aboutUs/Edit/<?php echo $row->id?>">
						<i class="fa fa-edit"></i>
						</a>
						
                    <a class="btn btn-danger" data-toggle="modal" data-target="#myModal" onclick="changeDeleteId(<?php echo $row->id;?>)">
					<i class="fa fa-trash-o"></i></a>	
						</td>
					</tr>
					
				<?php } } else "<tr><td colspan='4'>No Data Available.</td></tr>"; ?>
					
				</tbody>
			</table>
 </div>
  </div>
 <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Warning</h4>
         </div>
         <div class="modal-body">
            Are you sure to delete ?
         </div>
         <div class="modal-footer">
            <a type="button" class="btn btn-default" id="delete_no" href="">Yes</a>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<script>
   function changeDeleteId(x) {
      
   	var str = "<?php echo base_url(); ?>admin/aboutUs/Delete/" + x;
   	
       $("#delete_no").attr("href",str);
    
   }
</script>