<?php 
include_once("header.php"); 

$objfrogtype = new FrogType;

$frogtypedata = $objfrogtype->getFrogTypes();

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
        <li class="active">View Frog Types</li>
      </ol>
    </section>
        <!-- Main content -->
    <section class="content">
	    <div class="row">
	        <div class="col-xs-12">
		        <div class="box">
		            <div class="box-header">
		              <h3 class="box-title"><i class="fa fa-dot-circle-o"></i> List of Frog Types</h3>
		              
		              <div class="pull-right" style="clear:both">
		              	<a  href="addfrogtype.php" data-title="Add New Frog Type" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-xs"><i class="fa fa-plus-circle"></i> Add New Frog Type</a>
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
	                            	<th>Frog Type Name</th>
	                            	<th>Description</th>	                            	
	                            	<th>Date Created</th>
	                            	<th>Action</th>
				                </tr>
				            </thead>
				            <tbody>
				            <?php

				            	if(is_array($frogtypedata) && count($frogtypedata)>0){
				            		 $kounter = 1;                               
		                              foreach($frogtypedata as $key => $value){
		                         ?>
				            	<tr>
				            		<td><?php echo $kounter++; ?></td>
				            		<td>
				            			<?php if (empty($value['frogtype_image'])) {
				            			?>
				            				<img src="../assets/images/defaultfrog.png" alt="frog" class="img-thumbnail" style="width:100px;">
				            			<?php 
				            				}else{
				            			?>
				            				<img src="../assets/uploads/<?php echo $value['frogtype_image']; ?>" alt="frog" class="img-thumbnail" style="width:100px;">
				            			<?php	

				            			} ?>
				            			
				            		</td>					
		                            <td><?php echo $value['frogtype_name'] ?></td>
		                            <td>
		                            	<div style="word-wrap: break-word; width:320px; white-space:normal;">
		                            	<?php echo $value['frogtype_desc'] ?>
		                            	</div>
		                            		
		                            </td>		
		                            <td>
		                            	<?php 
		                            		echo date('d-M-Y', strtotime($value['date_created'])) 
		                            	?>
		                            		
		                            </td>
		                            <td>
		                            	<a  href="editfrogtype.php?id=<?php echo $value['frogtype_id']; ?>" data-title="Edit Frog Type: <?php echo $value['frogtype_name']; ?>" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-link text-left"><i class="fa fa-edit"></i> Edit</a>

		                            	
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
	                            	<th>Frog Type Name</th>
	                            	<th>Description</th>	                            	
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