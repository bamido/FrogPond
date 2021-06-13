<?php 
  include_once("../frogy/frogyclass.php"); 
  $objfrogtype = new FrogType;
  $frogtypedata = $objfrogtype->getFrogTypes();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo APP_NAME; ?> | Home</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{../assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">
  
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- frontend stylesheet -->
  <link rel="stylesheet" type="text/css" href="../assets/css/frontend.css">
</head>
<body class="hold-transition home-pagez">

<main class="py-4">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="home-logo">
          <a href="index.php"><h1><?php echo APP_NAME; ?></h1></a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="text-right" style="font-size: 24px; padding: 10px;">
          <a href="login.php">Login</a> |
          <a href="register.php">Register</a>
        </div>
      </div>
    </div>

    <div class="row">
    
      <?php 
        $kounter = 1;
        foreach ($frogtypedata as $key => $value) {
          
          if ($kounter>2 && $kounter < 6) {
            
            $class = "col-md-4";
          }else{
            
            $class = "col-md-6";
          }
          
      ?>

        <div class="<?php echo $class; ?> mb-4">
          <div style="background: url('../assets/uploads/<?php echo $value['frogtype_image']; ?>'); background-size: cover; height: 300px; margin-bottom: 10px;"></div>
          <h3>
            <?php 
              if (!empty($value['frogtype_name'])) {
                echo $value['frogtype_name'];
              }  
            ?>
          </h3>
          <p>
            <?php 
              if (!empty($value['frogtype_desc'])) {
                echo $value['frogtype_desc'];
              }  
            ?>

          </p>
          <div>
            
            
            <span class="text-success">
              <i class="fa fa-calendar"></i>
            <?php 
              if (!empty($value['date_created'])) {
                echo date('jS F, Y',strtotime($value['date_created']));
              }  
            ?>
            </span>
          </div>
        </div>
      <?php
      $kounter++;
      } ?>
    </div>

    <div class="row">
      <div class="col-md-12 text-center">
        <strong>Copyright &copy; <?php date('Y') ?> <a href="#"><?php echo APP_NAME; ?></a>.</strong> All rights
    reserved.
      </div>
    </div>
  </div>
</main>

<!-- jQuery 3 -->
<script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
