<?php
include_once("../frogy/frogyclass.php"); 
//var_dump($_REQUEST);
// create Frog class object
$frogobj = new Frog;
$frogitem = $frogobj->getFrogDetails($_REQUEST['id']);
//var_dump($frogitem)

// delete frog
if ($_SERVER['REQUEST_METHOD']=='POST') {
  $frogid = $_POST['id'];

  // reference delete frog method
  $output = $frogobj->deleteFrog($frogid);
  
  // redirect to view frog
  header("Location: viewdeadfrogs.php?msg=$output");
}
?>
<!-- page content -->
    <div class="container-fluid" id="form_container">
        <form id="theform" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left" autocomplete="off">

          <h3>
            Are you sure you want to delete this Frog? 
            <i><?php echo $frogitem['frog_name']; ?></i>
              
            </h3>
              
         <div class="row">
          <div class="col-md-6">
            <div class="myresponse"></div>
             <div class="ln_solid"></div>
          </div> 
          <div class="col-md-6"></div>         
        </div>
          
          
        <div class="form-row">
            
          <div class="form-group col-md-6">
           
          </div>
          <div class="form-group col-md-6">
            <div class="pull-right">  
            <input type="hidden" name="id" id="id" value="<?php echo $frogitem['frog_id']; ?>">              
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-success" id="btnsave">Yes, Delete Frog</button>
            </div>
          </div>
        </div>

        </form>
      </div>
 
 