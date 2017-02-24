  <!-- Header Starts -->
  <?php include 'includes/header.php'; ?> 
  <!-- Header Ends -->
  
  <!-- Left side column. contains the logo and sidebar -->
  <?php include 'includes/sidebar.php'; ?>
  <!-- Left side column ends -->


  <!-- Content Wrapper starts. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i> Users</a></li>
        <li class="active">Management</li>
      </ol>
    </section>

    
    <section class="content">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <a class="btn btn-primary" href="">Add New</a>

            <table class="table table-striped table-sm table-bordered table-hover">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Profile Picture</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    if (isset($_POST['delete'])){
                        $deleteuser = $_POST['delete'];
                        echo "Delete this: " .  $deleteuser;
                    }


                    $users = User::find_all_users();

                    foreach ($users as $user){
                        echo "<tr><td scope=\"row\">" . $user->id . "</td>";
                        echo "<td>" . $user->username . "</td>";
                        echo "<td>" . $user->first_name . "</td>";
                        echo "<td>" . $user->last_name . "</td>";
                        echo "<td> <img class='user_picture' src=\"{$user->picture}\" /></td>";
                        echo "<td>
                                <a href=''><i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i></a> | 
                                <a href='?delete=" . htmlspecialchars($user->id) . "'><i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i></a></td>
                              </tr>";
                    }




                ?>

                </tbody>
            </table>


































        </div>
      </div>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Footer -->
  <?php include 'includes/footer.php'?>