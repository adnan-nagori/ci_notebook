<?php 
include('admin_header.php');
//include('admin_sidebar.php');
?>
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url()?>admin/home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Login Screens:</h6>
          <a class="dropdown-item" href="login.html">Login</a>
          <a class="dropdown-item" href="register.html">Register</a>
          <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Other Pages:</h6>
          <a class="dropdown-item" href="404.html">404 Page</a>
          <a class="dropdown-item" href="blank.html">Blank Page</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url()?>admin/show_users">
          <i class="fas fa-fw fa-user"></i>
          <span>Users</span></a>
      </li>
    </ul>

    <div id="content-wrapper">
      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">All Users</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-user"></i>
            All User Data</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Contact No.</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Hobbies</th>
                    <th>Verify Status</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Contact No.</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Hobbies</th>
                    <th>Verify Status</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php 
                    foreach ($users as $key => $value) { ?>

                  <tr>
                    <td><?php echo $value->user_name;?></td>
                    <td><?php echo $value->user_email;?></td>
                    <td><?php echo $value->user_phone;?></td>
                    <?php
                    if($value->user_city != '' && $value->user_state == ''){
                      $add = ', '.$value->user_city;
                    }elseif($value->user_state != '' && $value->user_city != ''){
                      $add = ', '.$value->user_city.' ('.$value->user_state.') ';
                    }else{
                      $add = '';
                    }
                    ?>
                    <!-- <td><?php //echo $value->user_address.', '.$value->user_city.' ('.$value->user_state.') ';?></td> -->
                    <td><?php echo $value->user_address.' '.$add;?></td>
                    <td><?php echo $value->user_gender;?></td>
                    <td><?php echo $value->user_hobbies;?></td>
                    <td><?php echo $value->is_email_verified;?></td>
                  </tr>
                  <?php  }  ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

        <p class="small text-center text-muted my-5">
          <em>More table examples coming soon...</em>
        </p>

      </div>
      <!-- /.container-fluid -->

<?php 
include('admin_footer.php');
?>