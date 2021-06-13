<?php include_once("header.php"); ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php //var_dump($_SESSION); ?>
      <!-- Small boxes (Stat box) -->
      
      <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Ponds</h3>

              <p>list of all ponds</p>
            </div>
            <div class="icon">
              <i class="fa fa-hourglass-end"></i>
            </div>
            <a href="viewponds.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>Frog Types</h3>

              <p>list of all frog types</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="viewfrogtypes.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>Frogs</h3>

              <p>list of all frogs</p>
            </div>
            <div class="icon">
              <i class="fa fa-hourglass"></i>
            </div>
            <a href="viewfrogs.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
      </div> 
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        
       
      </div>
     
   
    </section>
    <!-- /.content -->



  </div>
<?php include_once("footer.php"); ?>