<?php 
include_once("header.php"); 

$objpond = new Pond;

$pondsdata = $objpond->getPonds();
//var_dump($pondsdata); //exit();
?>
<!-- content start here -->
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <i class="fa fa-th"></i> Frogy CMS
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>        
        <li class="active">View Ponds</li>
      </ol>
    </section>
        <!-- Main content -->
    <section class="content">
	    <div class="row">
	        <div class="col-xs-12">
		        <div class="box">
		            <div class="box-header">
		              <h3 class="box-title"><i class="fa fa-dot-circle-o"></i> List of ponds</h3>
		              
		              <div class="pull-right" style="clear:both">
		              	<a  href="addpond.php" data-title="Add New Pond" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-xs"><i class="fa fa-plus-circle"></i> Add New Pond</a>
		              </div>
		              	<?php
		              		if (isset($_REQUEST['msg'])){
		              	?>
				          <div class="alert alert-success" data-auto-dismiss role="alert" style="margin-top:10px;">
				            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
				            </button>
				             <strong> <?php echo $_REQUEST['msg']; ?></strong> 
				          </div>
				        <?php
				        	}
				        ?>     
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body table-responsive">
			            <table id="example1" class="table table-bordered table-striped table-hover ">
			            	<thead>
				                <tr>
				                  	<th>#</th>				                 
	                            	<th>Pond Name</th>
	                            	<th>Description</th>
	                            	<th>Status</th>
	                            	<th>Date Created</th>
	                            	<th>Action</th>
				                </tr>
				            </thead>
				            <tbody>
				            <?php

				            	if(is_array($pondsdata) && count($pondsdata)>0){
				            		 $kounter = 1;                               
		                              foreach($pondsdata as $key => $value){
		                         ?>
				            	<tr>
				            		<td><?php echo $kounter++; ?></td>					
		                            <td><?php echo $value['pond_name'] ?></td>
		                            <td><?php echo $value['pond_desc'] ?></td>
		                            <td>
		                            	<?php 
		                            	if($value['pond_status']=='Active'){ ?>
			                                <span class="badge badge-pill badge-success">
			                                  <?php echo $value['pond_status'] ?>
			                                </span>
		                              	<?php }elseif($value['pond_status']=='Inactive'){ ?>
			                                <span class="badge badge-pill badge-warning">
			                                  <?php echo $value['pond_status'] ?>
			                                </span>
			                            <?php }elseif($value['pond_status']=='Deleted'){ ?>
			                                <span class="badge badge-pill badge-danger">
			                                  <?php echo $value['pond_status'] ?>
			                                </span>
		                              	<?php } ?>
		                            </td>
		                            <td>
		                            	<?php 
		                            		echo date('d-M-Y', strtotime($value['date_created'])) 
		                            	?>
		                            		
		                            </td>
		                            <td>
		                            	<a  href="editpond.php?id=<?php echo $value['pond_id']; ?>" data-title="Edit Pond: <?php echo $value['pond_name']; ?>" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-link text-left"><i class="fa fa-edit"></i> Edit</a>

		                            	<a  href="deletepond.php?id=<?php echo $value['pond_id']; ?>" data-title="Delete Pond: <?php echo $value['pond_name']; ?>" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-link text-left"><i class="fa fa-trash"></i> Delete</a>
		                            </td>
	                            </tr>
	                            <?php
	                            		}
		                        	}
		                        ?>
				            	
				                
			                </tbody>
			                <tfoot>
				                <tr>
					               	<th>#</th>				                 
	                            	<th>Pond Name</th>
	                            	<th>Description</th>
	                            	<th>Status</th>
	                            	<th>Date Created</th>
	                            	<th>Action</th>
				                </tr>
			                </tfoot>
			            </table>
		            </div>
		        </div>
	      	</div>
	    </div>
	</section>




</div>    
<!-- content end here -->
<?php include_once("footer.php"); ?>