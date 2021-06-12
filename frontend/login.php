<?php include_once("../frogy/frogyclass.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo APP_NAME; ?> | login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
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
<body class="hold-transition login-page">
<?php
  if ($_SERVER['REQUEST_METHOD']=='POST') {

    // Validate inputs
    $errors = array();
    if (empty($_POST['email'])) {
      $errors['err_email'] = "Email Address field cannot be empty!";
    }elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
      $errors['err_email'] = "Invalid Email Address!";
    }

    if (empty($_POST['password'])) {
      $errors['err_pswd'] = "Password field cannot be empty!";
    }elseif(strlen($_POST['password']) < 6){
      $errors['err_pswd'] = "Password must be at least 6 characters!";
    }

    // if there is no error create instance of Auth class
    if (empty($errors)) {

      $regobj = new Auth;
      $result = $regobj->login($_POST['email'], $_POST['password']);

        if (isset($result['success'])) {
          // create session variables
          //echo $result['success'];                    

          header("Location: ../adminend/dashboard.php");
        }

    }


  }

?>

<main class="py-4">

  <div class="login-box">
    <div class="login-logo">
      <a href="index.php"><b><?php echo APP_NAME; ?></b></a>
    </div>

    <div class="login-box-body">
      <p class="login-box-msg">Login to your account</p>
        <?php 
          if (isset($result['error'])) {
        ?>
          <div class="invalid-feedback alert alert-danger">
              <?php echo $result['error']; ?>
          </div>
        <?php
          }
        ?>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">

        <div class="form-group has-feedback">
          <input type="email" class="form-control" placeholder="Email Address" name="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; } ?>" required autocomplete="email" autofocus>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          <?php if(isset($errors['err_email'])) { ?>
          
              <span class="invalid-feedback" role="alert">
                  <strong><?php echo $errors['err_email']; ?></strong>
              </span>
          <?php } ?>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password" required autocomplete="current-password" >
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          <?php if(isset($errors['err_pswd'])) { ?>
          
              <span class="invalid-feedback" role="alert">
                  <strong><?php echo $errors['err_pswd']; ?></strong>
              </span>
          <?php } ?>
        </div>
        <div class="row">
          <div class="col-xs-12">
           
            <button type="submit" class="btn btn-primary btn-block">
              Login
          </button>
          </div>
          

        </div>
      </form>
      
      <div class="text-center">
        <a class="btn btn-link" href="register.php">
                Create Account
              </a>
        <a href="index.php" class="text-muted">
        Back to home page
      </a>
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
