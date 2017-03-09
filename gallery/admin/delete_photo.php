<!-- Header Starts -->
<?php include 'includes/header.php'; ?>
<!-- Header Ends -->

<!-- Inserting Session check -->
<?php //if (!$session->is_signed_in()){ redirect("upload.php"); } ?>

<!-- Left side column. contains the logo and sidebar -->
<?php include 'includes/sidebar.php'; ?>
<!-- Left side column ends -->

<?php
    if (empty($_GET['id'])){
        redirect("photos.php");
    }

   $photo = Photo::find_by_id($_GET['id']);

    if ($photo){
        $photo->delete_photo();
        redirect("photos.php");
    }else {
        redirect("photos.php");
    }

?>




<!-- Content Wrapper starts. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content-header">
        <h1>
            Delete
            <small>Photo</small>
        </h1>
<!--        <ol class="breadcrumb">-->
<!--            <li><a href="#"><i class="fa fa-upload" aria-hidden="true"></i> Uploads </a></li>-->
<!--            <li class="active">Management</li>-->
<!--        </ol>-->
    </section>


    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


            </div>
        </div>

        <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php include 'includes/footer.php'?>