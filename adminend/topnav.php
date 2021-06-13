<header class="main-header">
    <!-- Logo -->
    <a href="dashboard.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>FP</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?php echo APP_NAME; ?></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         <?php 
            if (isset($_SESSION['user_firstname'])) { 
              $user_firstname = $_SESSION['user_firstname'];
            } 

            if (isset($_SESSION['user_lastname'])) { 
              $user_lastname = $_SESSION['user_lastname'];
            } 

            if (isset($_SESSION['user_rolename'])) { 
              $user_rolename = $_SESSION['user_rolename'];
            }else{
              $user_rolename = "Admin";
            } 
          ?>
   
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../assets/images/user.png" class="user-image" alt="User Image">
              <span class="hidden-xs">
                <?php echo $user_firstname." ".$user_lastname; ?>

                  </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../assets/images/user.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $user_firstname." ".$user_lastname; ?>  - <?php echo $user_rolename; ?>
                  
                </p>
              </li>
              <!-- Menu Body -->
        
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="">
                  <a class="btn btn-warning btn-block" href="logout.php"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      Logout
                  </a>

                  <form id="logout-form" action="logout.php" method="POST" style="display: none;">
                  </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>