<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../assets/images/user.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user_firstname." ".$user_lastname; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <!-- <i class="fa fa-angle-left pull-right"></i> -->
            </span>
          </a>
    
        </li>
        

        <li class="treeview">
          <a href="#">
            <i class="fa fa-tasks"></i>
            <span>Frogy CMS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="viewponds.php"><i class="fa fa-circle-o"></i> View Ponds</a>
            </li>
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> View Frog Types</a>
            </li>
            <li>
              <a href="addfrog.php" data-title="Add Frog" data-remote="false" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false"><i class="fa fa-circle-o"></i> Add Frog</a>
            </li>
            <li>
              <a href="viewfrogs.php"><i class="fa fa-circle-o"></i> View Frogs</a>
            </li>
            
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-gears"></i>
            <span>My Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> Edit Profile</a>
            </li>
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> Change Password</a>
            </li>
          </ul>
        </li>

        

        <li class="treeview">
          <a href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out"></i> <span>Logout</span>
            <span class="pull-right-container">
              <!-- <i class="fa fa-angle-left pull-right"></i> -->
            </span>
          </a>
    
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

<?php include('mymodal.php'); ?>   