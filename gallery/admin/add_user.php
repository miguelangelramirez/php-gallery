<!-- Header Starts -->
<?php include 'includes/header.php'; ?>
<!-- Header Ends -->

<!-- Inserting Session check -->
<?php //if (!$session->is_signed_in()){ redirect("upload.php"); } ?>

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
            <li><a href="#"><i class="fa fa-upload" aria-hidden="true"></i> Uploads </a></li>
            <li class="active">Management</li>
        </ol>
    </section>


    <section class="content">
        <div class="row">
            <?php
                if (isset($_POST['save'])){
                    $user = new User();
                    $user->username = $_POST['username'];
                    $user->first_name = $_POST['first_name'];
                    $user->last_name = $_POST['last_name'];
                    $user->password = $_POST['password'];
                    $user->signup_date = date('Y-m-d');
//                    Adding the picture to the database with a new method
                    $user->set_file($_FILES['user_image']);
                    $user->save_user_and_image();
                }

            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" type="text" name="username" placeholder="Username" >
                    </div>
                    <div class="form-group">
                        <label>Password: </label>
                        <input class="form-control" type="password" name="password" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <label>First Name: </label>
                        <input class="form-control" type="text" name="first_name" placeholder="First Name">
                    </div>

                    <div class="form-group">
                        <label>Last Name: </label>
                        <input class="form-control" type="text" name="last_name" placeholder="Last Name">
                    </div>
                    <label>Profile Picture: </label>

                    <input type="file" name="user_image">

                    <div class="info-box-update pull-right ">
                        <input type="submit" name="save" value="Save User" class="btn btn-primary btn-lg ">
                    </div>

                </div>
            </form>





        </div>

        <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php include 'includes/footer.php'?>