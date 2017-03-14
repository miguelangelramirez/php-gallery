  <!-- Header Starts -->
  <?php include 'includes/header.php'; ?> 
  <!-- Header Ends -->
  
  <!-- Left side column. contains the logo and sidebar -->
  <?php include 'includes/sidebar.php'; ?>
  <!-- Left side column ends -->


  <div class="delete-user-modal">
      <div class="modal">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Default Modal</h4>
                  </div>
                  <div class="modal-body">
                      <p>One fine body&hellip;</p>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
              </div>
              <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
  </div>
  <!-- /.example-modal -->


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

            <a class="btn btn-primary" href="add_user.php">Add New</a>
            <hr>

            <table class="table table-striped table-sm table-bordered table-hover">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Profile Picture</th>
                    <th>Last Login</th>
                    <th>Actions</th>

                </tr>
                </thead>
                <tbody>
                <?php
                    if (isset($_GET['delete'])){
                        $delete_this_id = $_GET['delete'];
//                        echo $delete_this_user;
                        $user = User::find_by_id($delete_this_id);


                        $user->delete();
                        redirect("users.php");
//                        echo "delete this" .  $_GET['delete'];
                    }


                    $users = User::find_all();

                    foreach ($users as $user){
                        echo "<tr><td scope=\"row\">" . $user->id . "</td>";
                        echo "<td>" . $user->username . "</td>";
                        echo "<td>" . $user->first_name . "</td>";
                        echo "<td>" . $user->last_name . "</td>";
                        echo "<td> <img class='user_picture' src='{$user->image_path_and_placeholder()}' /></td>";
                        echo "<td>{$user->last_login}</td>";
                        echo "<td>
                                <a href='#' data-toggle=\"modal\" data-target=\"delete-user-modal\">Delete</a> | 
                                <a href='edit_user.php?edit=". $user->id ."'><i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i></a> | 
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