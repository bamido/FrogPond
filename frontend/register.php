<?php
  session_start(); 
  include_once("../frogy/frogyclass.php"); 
?>
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
    if (empty($_POST['lastname'])) {
      $errors['err_lastname'] = "Lastname field cannot be empty!";
    }

    if (empty($_POST['firstname'])) {
      $errors['err_firstname'] = "Firstname field cannot be empty!";
    }

    if (empty($_POST['email'])) {
      $errors['err_email'] = "Email Address field cannot be empty!";
    }elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
      $errors['err_email'] = "Invalid Email Address!";
    }

    if (empty($_POST['password'])) {
      $errors['err_pswd'] = "Password field cannot be empty!";
    }elseif(strlen($_POST['password']) < 6){
      $errors['err_pswd'] = "Password must be at least 6 characters!";
    }elseif($_POST['password'] !== $_POST['password_confirmation']){
      $errors['err_pswd'] = "Password confirmation not matched!";
    }

    // if there is no error create instance of Auth class
    if (empty($errors)) {

      $regobj = new Auth;

      // sanitize inputs 
      $lastname = $regobj->sanitizeInput($_POST['lastname']);
      $firstname = $regobj->sanitizeInput($_POST['firstname']);
      $emailaddress = $regobj->sanitizeInput($_POST['email']);
      $password = $_POST['password'];

      $result = $regobj->register($lastname, $firstname, $emailaddress, $password);

      if (isset($result['success'])) {
        // get user details and create session variables
        $user = $regobj->getUserDetails($result['success']);
        //echo $result['success'];
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_lastname'] = $user['lastname'];
        $_SESSION['user_firstname'] = $user['firstname'];
        $_SESSION['user_email'] = $user['emailaddress'];
        $_SESSION['user_rolename'] = $user['role_name'];
        $_SESSION['frogy_wakanow'] = "wonakaw";

        header("Location: ../adminend/dashboard.php");
      }
    }


  }

?>

<main class="py-4">

  <div class="register-box">
  <div class="register-logo">
    <a href="index.php"><b><?php echo APP_NAME; ?></b></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register</p>
      <?php 
        if (isset($result['error'])) {
      ?>
        <div class="invalid-feedback alert alert-danger">
            <?php echo $result['error']; ?>
        </div>
      <?php
        }
      ?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">

      <div class="form-group has-feedback">
        <input id="lastname" type="text" class="form-control" name="lastname" value="<?php if(isset($_POST['lastname'])){ echo $_POST['lastname']; } ?>" required autocomplete="lastname" autofocus placeholder="Lastname">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?php if(isset($errors['err_lastname'])) { ?>
          
              <span class="invalid-feedback" role="alert">
                  <strong><?php echo $errors['err_lastname']; ?></strong>
              </span>
          <?php } ?>
      </div>
      <div class="form-group has-feedback">
        <input id="firstname" type="text" class="form-control" name="firstname" value="<?php if(isset($_POST['firstname'])){ echo $_POST['firstname']; } ?>" required autocomplete="firstname" autofocus placeholder="Firstname">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?php if(isset($errors['err_firstname'])) { ?>
          
            <span class="invalid-feedback" role="alert">
                <strong><?php echo $errors['err_firstname']; ?></strong>
            </span>
        <?php } ?>
      </div>
      <div class="form-group has-feedback">
        <input id="email" type="email" class="form-control" name="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; } ?>" required autocomplete="email" placeholder="Email Address">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?php if(isset($errors['err_email'])) { ?>
          
            <span class="invalid-feedback" role="alert">
                <strong><?php echo $errors['err_email']; ?></strong>
            </span>
        <?php } ?>
      </div>
      <div class="form-group has-feedback">
        <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?php if(isset($errors['err_pswd'])) { ?>
          
            <span class="invalid-feedback" role="alert">
                <strong><?php echo $errors['err_pswd']; ?></strong>
            </span>
        <?php } ?>
      </div>
      <div class="form-group has-feedback">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        
        <div class="col-xs-12">
            <button type="submit" class="btn btn-primary btn-block">
                Register
            </button>
        </div>

      </div>
    </form>

   
    <a href="login.php" class="text-center">Already have account? Login</a>
  </div>

</div>


</main>

<!-- jQuery 3 -->
<script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
