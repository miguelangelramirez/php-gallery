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
            Edit
            <small>User</small>
        </h1>
        <!--        <ol class="breadcrumb">-->
        <!--            <li><a href="#"><i class="fa fa-upload" aria-hidden="true"></i> Uploads </a></li>-->
        <!--            <li class="active">Management</li>-->
        <!--        </ol>-->
    </section>


    <section class="content">
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <?php
                    if (empty($_GET['edit'])){
                        redirect("users.php");
                    }else{
                        $user = User::find_by_id($_GET['edit']);
                    }

                    if (isset($_POST['update'])){
                        $user = User::find_by_id($_GET['edit']);

                        $user->username = $_POST['username'];
                        $user->first_name = $_POST['first_name'];
                        $user->last_name = $_POST['last_name'];
                        $user->password = $_POST['password'];

                        if (empty($_FILES['user_image'])){
                            $user->save();
                        }else {
                            $user->set_file($_FILES['user_image']);
                            $user->save_user_and_image();
                            $user->save();
                            redirect("edit_user.php?edit={$user->id}");
                        }
                    }

                    if (isset($_GET['delete'])){
                        echo $_GET['delete'];
//                        redirect("users.php?edit={$_GET['delete']}");
                    }


                ?>

                <div class="form-group">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group"><label>Username: </label>
                            <input class="form-control" type="text" name="username" value="<?php echo $user->username;  ?>">
                        </div>
                        <div class="form-group">
                            <label>First Name: </label>
                            <input class="form-control" type="text" name="first_name" value="<?php echo $user->first_name; ?>" >
                        </div>

                        <div class="form-group">
                            <label>Last Name: </label>
                            <input class="form-control" type="text" name="last_name" value="<?php echo $user->last_name; ?>" >
                        </div>



                        <div class="form-group">
                            <label>Password: </label>
                            <input class="form-control" type="password" name="password" value="<?php echo $user->password; ?>">
                        </div>


                </div>
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12">
                <div style="margin-top: 0;" class="thumbnail edit_photo">
                    <img src="<?php echo $user->image_path_and_placeholder(); ?>" />
                    <br>
                    <input type="file" name="user_image">
                </div>
            </div>


            <div class="col-md-4" >
                <div  class="photo-info-box">
                    <div class="info-box-header">
                        <h4>Actions <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                    </div>
                    <div class="inside">
                        <div class="box-inner">
                            <p class="text">
                                <span class="glyphicon glyphicon-calendar"></span> Sign-up on: <?php echo $user->signup_date;  ?>
                            </p>
                            <p class="text">
                                <span class="glyphicon glyphicon-calendar"></span> Modified on: <?php echo $user->modified_date;  ?>
                            </p>
                            <p class="text ">
                                User Id: <span class="data photo_id_box"><?php echo $user->id; ?></span>
                            </p>

                        </div>
                        <div class="info-box-footer clearfix">
                            <div class="info-box-delete pull-left">
                                <a  href="delete_user.php?delete=<?php echo $user->id; ?>" class="btn btn-danger btn-lg ">Delete</a>
                            </div>
                            <div class="info-box-update pull-right ">
                                <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg ">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            </form>


        </div>
        </div>
    </section>

        <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php include 'includes/footer.php'?>