<?php
session_start();
include_once("../frogy/frogyclass.php"); 
// create pond object and get active ponds
$pondobj = new Pond;
$ponditem = $pondobj->getActivePonds();

// create frog type object and get frog types
$frogtypeobj = new FrogType;
$frogtypeobjdata = $frogtypeobj->getFrogTypes();

// frog details
// create pond object
$frogobj = new Frog;
$frogitem = $frogobj->getFrogDetails($_REQUEST['id']);
?>

<!-- page content -->

    <div class="container-fluid" id="form_container">
        <form id="theform" action="" method="post" enctype="multipart/form-data"  autocomplete="off">

          <div class="form-row">
            <div class="form-group col-md-6">
              <label class="control-label" for="pondname">Pond Name <span class="required">*</span>
              </label>
             
              <select id="pondname" name="pondname" required="required" class="form-control" disabled="disabled">
                <option value="">Choose Pond</option>
                <?php foreach ($ponditem as $key => $value) {
                ?>
                  <option value="<?php echo $value['pond_id']; ?>" <?php if($frogitem['pond_id']==$value['pond_id']){echo "selected"; } ?>><?php echo $value['pond_name']; ?></option>
                <?php
                } ?>
              </select>
            </div>   

            <div class="form-group col-md-6">
              <label class="control-label" for="frogtype">Frog Type <span class="required">*</span>
              </label>
             
              <select id="frogtype" name="frogtype" required="required" class="form-control" disabled="disabled">
                <option value="">Choose Frog Type</option>
                <?php foreach ($frogtypeobjdata as $key => $value) {
                ?>
                  <option value="<?php echo $value['frogtype_id']; ?>" <?php if($frogitem['frogtype_id']==$value['frogtype_id']){echo "selected"; } ?>><?php echo $value['frogtype_name']; ?></option>
                <?php
                } ?>
              </select>
            </div>                                                
           
          </div>  

           

          <div class="form-row">
            <div class="form-group col-md-12">
              <label class="control-label" for="frogname">Frog Name <span class="required">*</span>
              </label>
              <input type="text" id="frogname" name="frogname" required="required" class="form-control" autocomplete="off" value="<?php if(isset($frogitem['frog_name'])){ echo $frogitem['frog_name']; } ?>" disabled="disabled">
             
            </div>                                              
           
          </div>  

          <div class="form-row">
            <div class="form-group col-md-6">
              <label class="control-label" for="gender">Gender <span class="required"></span>
              </label>
              <select  id="gender" name="gender" class="form-control col-md-7 col-xs-12" disabled="disabled">
                <option value="Male" <?php if ($frogitem['gender']=='Male') {
                  echo "selected";} ?>>Male</option>
                <option value="Female" <?php if ($frogitem['gender']=='Female') {
                  echo "selected";} ?>>Female</option>                
              </select>
             
            </div> 

             <div class="form-group col-md-6">
              <label class="control-label" for="frogage">Frog Age <span class="required">*</span>
              </label>
              <input type="date" id="frogage" name="frogage" required="required" class="form-control" autocomplete="off" placeholder="dd/mm/yyyy" value="<?php if(isset($frogitem['age'])){ echo $frogitem['age']; } ?>" disabled="disabled">
             
            </div>                                               
           
          </div> 

          <div class="form-row">
            <div class="form-group col-md-6">
              <label class="control-label" for="color">Color <span class="required">*</span>
              </label>
              <input type="text" id="color" name="color" required="required" class="form-control" autocomplete="off" value="<?php if(isset($frogitem['color'])){ echo $frogitem['color']; } ?>" disabled="disabled">
             
            </div> 

             <div class="form-group col-md-6">
              <label class="control-label" for="weight">Weight <span class="required">*</span>
              </label>
              <input type="text" id="weight" name="weight" required="required" class="form-control" autocomplete="off" onkeypress="return isNumberKey(event)" value="<?php if(isset($frogitem['weight'])){ echo $frogitem['weight']; } ?>" disabled="disabled">
             
            </div>                                               
           
          </div> 

          <div class="form-row">
            <div class="form-group col-md-12">
              <label class="control-label" for="description">Frog Description <span class="required"></span>
              </label>
              <textarea  id="description" name="description" rows="3" placeholder="" class="form-control summernote" disabled="disabled"><?php if(isset($frogitem['description'])){ echo $frogitem['description']; } ?></textarea>
             
            </div>                                              
           
          </div> 


          <div class="form-row">
            <div class="form-group col-md-6">
              
              <label class="control-label" for="frogimage">Frog Image <span class="required"></span>
                
              </label>
           
              <?php if(!empty($frogitem['frog_image'])){ ?>
                <img src="../assets/uploads/<?php echo $frogitem['frog_image']; ?>" class="img-responsive img-thumbnail" style="width:85px; height: 85px" alt="frog image"> 
                <?php } ?>
           
             
            </div>  

            <div class="form-group col-md-6">
              <label class="control-label" for="status">Status <span class="required">*</span>
              </label>
              <select  id="status" name="status" required="required" class="form-control col-md-7 col-xs-12" disabled="disabled">
                <option value="Healthy" <?php if ($frogitem['status']=='Healthy') {
                  echo "selected";
                } ?>>Healthy</option>
                <option value="Sicky" <?php if ($frogitem['status']=='Sicky') {
                  echo "selected";
                } ?>>Sicky</option> 
                <option value="Dead" <?php if ($frogitem['status']=='Dead') {
                  echo "selected";
                } ?>>Dead</option>                
              </select>
             
            </div>                                              
           
          </div> 
              
         <div class="row">
          <div class="col-md-6">
            <div class="myresponse"></div>
             <div class="ln_solid"></div>
          </div> 
          <div class="col-md-6"></div>         
        </div>
          
          


        </form>
      </div>
    

    
<!-- jQuery -->
<script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>    
<script type="text/javascript">

  $('#loadinggif').hide(); // hide the loading gif   

  $('#theform').submit(function(e) {
    e.preventDefault();

     $('#btnsave').prop('disabled', true);
  
    var formData = new FormData($(this)[0]); 

    //alert(formData);

    $('#loadinggif').show();  // show the loading gif.

            $.ajax({
                type: "POST",
                url:  "updatefrog.php", 
                data: formData, 
                processData: false,
                contentType: false,
                success: function (response){ 
                var theresponse = JSON.parse(response);
                //console.log(theresponse);

                if(theresponse.success != null){
                  
                window.location = "viewfrogs.php?msg="+theresponse.success;      
                }else{
                  $('#btnsave').prop('disabled', false);
                  $('#loadinggif').hide(); // hide the loading gif   
                  
                  
                  //console.log(theresponse);
                  var errorString = "<ul class='error'>";
                      errorString += " <div class='alert alert-danger alert-dismissible fade in' role='alert'>";
                      errorString += "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>";
                  $.each( theresponse, function( key, value) {
                     
                      errorString += "<li>" + value + "</li>";
                  });
                  errorString += "</div></ul>";
                   $('.myresponse').html(errorString); 

                }
                         
                },
                error: function(Error){
                  $('#btnsave').prop('disabled', false);
                  $('#loadinggif').hide(); // hide the loading gif   
                  alert('Error: something went wrong!');
                }

            });
            return false;
        });

</script>

<script type="text/javascript">
   <!--
   function isNumberKey(evt)
   {
      var charCode = (evt.which) ? evt.which : evt.keyCode;
      if (charCode == 46 && evt.srcElement.value.split('.').length>1) 
        { return false; }
      if (charCode != 46 && charCode > 31 
        && (charCode < 48 || charCode > 57) )
         return false;

      return true;
   }
   //-->
</script>
 