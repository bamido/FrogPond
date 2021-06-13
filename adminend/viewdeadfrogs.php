<?php 
include_once("header.php"); 

$objfrog = new Frog;

$frogsdata = $objfrog->getDeadFrogs();
//var_dump($frogsdata); //exit();
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
        <li class="active">View Dead Frogs</li>
      </ol>
    </section>
        <!-- Main content -->
    <section class="content">
	    <div class="row">
	        <div class="col-xs-12">
		        <div class="box">
		            <div class="box-header">
		              <h3 class="box-title"><i class="fa fa-dot-circle-o"></i> List of frogs</h3>
		              
		              <div class="pull-right" style="clear:both">
		              	<a  href="addfrog.php" data-title="Add New Frog" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-xs" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus-circle"></i> Add New Frog</a>
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
				                  	<th>Image</th>			                 
	                            	<th>Frog Name</th>
	                            	<th>Pond Name</th>
	                            	<th>Frog Type</th>
	                            	<th>Gender</th>
	                            	<th>Age</th>
	                            	<th>Color</th>
	                            	<th>Weight</th>
	                            	
	                            	<th>Status</th>
	                            	<th>Date Added</th>
	                            	<th>Action</th>
				                </tr>
				            </thead>
				            <tbody>
				            <?php

				            	if(is_array($frogsdata) && count($frogsdata)>0){
				            		 $kounter = 1;                               
		                              foreach($frogsdata as $key => $value){
		                         ?>
				            	<tr>
				            		<td><?php echo $kounter++; ?></td>	
				            		<td>
				            			<?php if (empty($value['frog_image'])) {
				            			?>
				            				<img src="../assets/images/defaultfrog.png" alt="frog" class="img-thumbnail" style="width:70px;">
				            			<?php 
				            				}else{
				            			?>
				            				<img src="../assets/uploads/<?php echo $value['frog_image']; ?>" alt="frog" class="img-thumbnail" style="width:70px;">
				            			<?php	

				            			} ?>
				            			
				            		</td>					
		                            <td><?php echo $value['frog_name'] ?></td>
		                            <td><?php echo $value['pond_name'] ?></td>
		                            <td><?php echo $value['frogtype_name'] ?></td>
		                            <td><?php echo $value['gender'] ?></td>
		                            <td>
		                            	<?php 
										
											$age = floor((time() - strtotime($value['age'])) / 31556926); //31556926 is the number of seconds in a year.
											if($age==0) {
												echo "less than 1 year";
											}elseif (($age==1)) {
												echo "1 year";
											}else{
												echo $age." years";
											}
											
		                            	?>
		                            	
		                            </td>
		                            <td><?php echo $value['color'] ?></td>
		                            <td><?php echo $value['weight'] ?></td>
		                            
		                            <td>
		                            	<?php 
		                            	if($value['status']=='Healthy'){ ?>
			                                <span class="badge badge-pill badge-success">
			                                  <?php echo $value['status'] ?>
			                                </span>
		                              	<?php }elseif($value['status']=='Sicky'){ ?>
			                                <span class="badge badge-pill badge-warning">
			                                  <?php echo $value['status'] ?>
			                                </span>
			                            <?php }elseif($value['status']=='Dead'){ ?>
			                                <span class="badge badge-pill badge-danger">
			                                  <?php echo $value['status'] ?>
			                                </span>
		                              	<?php } ?>
		                            </td>
		                            <td>
		                            	<?php 
		                            		echo date('d-M-Y', strtotime($value['date_created'])) 
		                            	?>
		                            		
		                            </td>
		                            <td>
		                            	<a  href="showfrog.php?id=<?php echo $value['frog_id']; ?>" data-title="View Frog Details: <?php echo $value['frog_name']; ?>" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-link text-left" data-backdrop="static" data-keyboard="false"><i class="fa fa-eye"></i> Details</a>

		                            	<a  href="editfrog.php?id=<?php echo $value['frog_id']; ?>" data-title="Edit Frog Details: <?php echo $value['frog_name']; ?>" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-link text-left" data-backdrop="static" data-keyboard="false"><i class="fa fa-edit"></i> Edit</a>

		                            	
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
					               	<th>Image</th>				                 
	                            	<th>Frog Name</th>
	                            	<th>Pond Name</th>
	                            	<th>Frog Type</th>
	                            	<th>Gender</th>
	                            	<th>Age</th>
	                            	<th>Color</th>
	                            	<th>Weight</th>
	                            	
	                            	<th>Status</th>
	                            	<th>Date Added</th>
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