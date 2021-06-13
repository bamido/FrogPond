<!-- page content -->

    <div class="container-fluid" id="form_container">
        <form id="theform" action="" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left" autocomplete="off">

          <div class="form-row">
            <div class="form-group col-md-12">
              <label class="control-label" for="frogtypename">Frog Type Name <span class="required">*</span>
              </label>
              <input type="text" id="frogtypename" name="frogtypename" required="required" class="form-control" autocomplete="off">
             
            </div>                                              
           
          </div>  

          <div class="form-row">
            <div class="form-group col-md-12">
              <label class="control-label" for="description">Description <span class="required">*</span>
              </label>
              <textarea  id="description" name="description" rows="8" required="required" placeholder="" class="form-control summernote"></textarea>
             
            </div>                                              
           
          </div> 

          <div class="form-row">
            <div class="form-group col-md-12">
              <label class="control-label" for="frogimage">Upload Image <span class="required"></span>
              </label>
              <input type="file" id="frogimage" name="frogimage" class="form-control" autocomplete="off">
             
            </div>  
          </div>

              
         <div class="row">
          <div class="col-md-6">
            <div class="myresponse"></div>
             <div class="ln_solid"></div>
          </div> 
          <div class="col-md-6"></div>         
        </div>
          
          
        <div class="form-row">
            
          <div class="form-group col-md-6">
            <img src="../assets/images/processing2.gif" alt="processing" id="loadinggif"/>
          </div>
          <div class="form-group col-md-6">
            <div class="pull-right">  
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>              
			        <button class="btn btn-primary" type="reset">Reset</button>
              <button type="submit" class="btn btn-success" id="btnsave">Submit</button>
            </div>
          </div>
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
                url:  "savefrogtype.php", 
                data: formData, 
                processData: false,
                contentType: false,
                success: function (response){ 
                var theresponse = JSON.parse(response);
                //console.log(theresponse);

                if(theresponse.success != null){
                  
                window.location = "viewfrogtypes.php?msg="+theresponse.success;      
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


 <!-- Scripts -->

 